<?php

namespace App\Http\Controllers;

use App\Mail\Pemberitahuan as MailPemberitahuan;
use App\Models\Pemberitahuan as ModelPemberitahuan;
use App\Models\Konfirmasi;
use App\Models\Pendaftar;
use App\Models\Rekrutmen;
use App\Models\Smsd;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

// use GuzzleHttp\Client;




class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function unduh($id)
    {
        $pendaftar = Pendaftar::where('rekrutmen_id', $id)->get();
        File::makeDirectory(storage_path('biodata/temp/'));

        foreach ($pendaftar as $data) {
            $values = [];

            $data->rekrutmen->data_formulir = json_decode($data->rekrutmen->data_formulir);
            $data->data_formulir            = json_decode($data->data_formulir);

            foreach (array_combine($data->rekrutmen->data_formulir, $data->data_formulir) as $data_r => $data_p) {
                array_push($values, ['key' => $data_r, 'value' => $data_p]);
            }

            $nama_rekrutmen = $data->rekrutmen->nama;
            $nama           = $data->nama;
            $email          = $data->email;
            $no_hp          = $data->no_hp;
            $foto           = $data->foto;

            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('biodata_pendaftar.docx'));
            $template->setValue('nama_rekrutmen', $nama_rekrutmen);
            $template->setValue('nama', $nama);
            $template->setValue('email', $email);
            $template->setValue('no_hp', $no_hp);
            $template->setImageValue('foto', array('path' => storage_path('app/public/foto/' . $foto), 'width' => 120, 'height' => 150, 'ratio' => false));
            $template->cloneRowAndSetValues('key', $values);
            $filename = $data->id . ". " . $nama . ".docx";
            $template->saveAs(storage_path('biodata/temp/' . $filename));
        }

        // //membuat zip file
        $zip_file = $pendaftar[0]->rekrutmen->nama . '.zip';
        $zip      = new \ZipArchive();
        $zip->open(public_path('temp/' . $zip_file), \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $path = storage_path('biodata/temp');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));

        foreach ($files as $name => $file) {
            // Melewati sufolder
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();

                // mendapatkan nama file
                $relativePath = 'biodata/' . substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        File::deleteDirectory(storage_path('biodata/temp'));

        return response()->download(public_path('temp/' . $zip_file));
    }

    public function index()
    {
        $organisasi = Auth::user();
        $rekrutmen = Rekrutmen::where('organisasi_id', $organisasi->id)->orderBy('created_at', 'DESC')->withCount('pendaftar')->get();
        return view('admin.pendaftar', ['rekrutmen' => $rekrutmen]);
    }

    public function test()
    {
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.autochat.id/api/message/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'phone' => '0895341785757',
            'name' => 'Irham',
            'message' => 'Hallo Gaes Yow',
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $headers = array();
        $headers[] = 'X-Api-Key: 298606ffdd7a1349685a6d5c1558aa3033c4a19c';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        // curl_close($ch); 

        echo $result;
        curl_close($ch);

        // https://incarnate.github.io/curl-to-php/ <- ubah command curl ke pdf


    }


    public function list($id)
    {
        $pendaftar = Pendaftar::where('rekrutmen_id', $id)->get();
        $pemberitahuan = ModelPemberitahuan::where('rekrutmen_id', $id)->paginate(5);
        return view('admin.list-pendaftar', ['pendaftar' => $pendaftar, 'pemberitahuan' => $pemberitahuan]);
        //
    }

    public function pemberitahuan(Request $request, $id)
    {
        $request->validate([
            'checkbox' => 'required',
        ]);

        $pendaftar = $request->checkbox;
        return view('admin.kirim-pemberitahuan-pendaftar', ['pendaftar' => $pendaftar]);
    }

    public function kirim(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pendaftar' => 'required',
            'layanan' => 'required',
            'pesan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/pendaftar/list/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->konfirmasi_kehadiran == "true") {

            foreach ($request->pendaftar as $pendaftar) {

                $random_hash = bin2hex(random_bytes(32));
                $pendaftar   = json_decode($pendaftar);

                foreach ($request->layanan as $layanan) {

                    if ($layanan == 'whatsapp') {
                        $pesan   = $request->pesan . " http://rekrutmen.fia/konfirmasi/" . $random_hash;
                        $ch      = curl_init();
                        curl_setopt($ch, CURLOPT_URL, 'https://api.autochat.id/api/message/send');
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        $post = array(
                            'phone'   => $pendaftar->no_hp,
                            'name'    => 'Admin',
                            'message' => $pesan,
                        );
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                        $headers   = array();
                        $headers[] = 'X-Api-Key: 298606ffdd7a1349685a6d5c1558aa3033c4a19c';
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        $result    = curl_exec($ch);
                        if (curl_errno($ch)) {
                            echo 'Error:' . curl_error($ch);
                        }
                    }

                    if ($layanan == 'email') {
                        $pesan = $request->pesan . " <a href='http://rekrutmen.fia/konfirmasi/" . $random_hash . "'>http://rekrutmen.fia/konfirmasi/" . $random_hash . "</a>";
                        Mail::to($pendaftar->email)->queue(new MailPemberitahuan($pendaftar, $pesan));
                    }

                    if ($layanan == 'sms') {
                        $pesan = $request->pesan . " http://rekrutmen.fia/konfirmasi/" . $random_hash;

                        //belum diatur mengirim pesan yang panjangnya lebih dari 160 karakter https://blog.rosihanari.net/teknik-mengirim-long-text-sms-gammu-dengan-query-sql/
                        Smsd::create([
                            'DestinationNumber' => $pendaftar->no_hp,
                            'TextDecoded'       => $pesan,
                            'CreatorID'         => $id,
                        ]);
                    }
                }
                //masukkan kode ke database
                Konfirmasi::create([
                    'pendaftar_id' => $pendaftar->id,
                    'kode'         => $random_hash,
                ]);

                //update status pendaftar menjadi proses konfirmasi
                $pendaftar = Pendaftar::findOrFail($pendaftar->id);
                $pendaftar->update([
                    'status' => 'proses konfirmasi',
                ]);
            }
        } else {
            foreach ($request->layanan as $layanan) {
                foreach ($request->pendaftar as $pendaftar) {
                    $pendaftar   = json_decode($pendaftar);
                    if ($layanan == 'whatsapp') {
                        $ch      = curl_init();
                        curl_setopt($ch, CURLOPT_URL, 'https://api.autochat.id/api/message/send');
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        $post = array(
                            'phone'   => $pendaftar->no_hp,
                            'name'    => 'Admin',
                            'message' => $request->pesan,
                        );
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

                        $headers   = array();
                        $headers[] = 'X-Api-Key: 298606ffdd7a1349685a6d5c1558aa3033c4a19c';
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                        $result = curl_exec($ch);
                        if (curl_errno($ch)) {
                            echo 'Error:' . curl_error($ch);
                        }
                    }
                    if ($layanan == 'email') {
                        Mail::to($pendaftar->email)->queue(new MailPemberitahuan($pendaftar, $request->pesan));
                    }
                    if ($layanan == 'sms') {
                        Smsd::create([
                            'DestinationNumber' => $pendaftar->no_hp,
                            'TextDecoded'       => $request->pesan,
                            'CreatorID'         => $id,
                        ]);
                    }
                }
            }
        }

        // menyimpan data ke  tabel pemberitahuan
        $penerima = [];
        $layanan  = [];
        foreach ($request->pendaftar as $pendaftar) {
            $pendaftar = json_decode($pendaftar);
            array_push($penerima, $pendaftar->nama);
        }
        $penerima = array_filter($penerima, 'strlen');
        $penerima = json_encode(array_values($penerima));
        $layanan  = json_encode($request->layanan);

        ModelPemberitahuan::create([
            'rekrutmen_id' => $id,
            'penerima'     => $penerima,
            'layanan'      => $layanan,
            'pesan'        => $request->pesan,
        ]);

        return redirect('/admin/pendaftar/list/' . $id)->with('message', 'Berhasil Mengirim');
    }

    public function kirim2(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pendaftar' => 'required',
            'layanan' => 'required',
            'pesan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/pendaftar/list/' . $id)
                ->withErrors($validator)
                ->withInput();
        }
        $random_hash = "";

        foreach ($request->pendaftar as $pendaftar) {
            $pendaftar   = json_decode($pendaftar);
            if ($request->konfirmasi_kehadiran == "true") {
                $random_hash = bin2hex(random_bytes(32));
                $pesan   = $request->pesan . " http://rekrutmen.fia/konfirmasi/" . $random_hash;

                Konfirmasi::create([
                    'pendaftar_id' => $pendaftar->id,
                    'kode'         => $random_hash,
                ]);
                $pendaftar = Pendaftar::findOrFail($pendaftar->id);
                $pendaftar->update([
                    'status' => 'proses konfirmasi',
                ]);
            } else {
                $pesan = $request->pesan;
            }

            foreach ($request->layanan as $layanan) {
                if ($layanan == 'whatsapp') {
                    $ch      = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://api.autochat.id/api/message/send');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    $post = array(
                        'phone'   => $pendaftar->no_hp,
                        'name'    => 'Admin',
                        'message' => $pesan,
                    );
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                    $headers   = array();
                    $headers[] = 'X-Api-Key: 298606ffdd7a1349685a6d5c1558aa3033c4a19c';
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    $result    = curl_exec($ch);
                    if (curl_errno($ch)) {
                        echo 'Error:' . curl_error($ch);
                    }
                }

                if ($layanan == 'email') {
                    Mail::to($pendaftar->email)->queue(new MailPemberitahuan($pendaftar, $pesan));
                }

                if ($layanan == 'sms') {
                    //belum diatur mengirim pesan yang panjangnya lebih dari 160 karakter https://blog.rosihanari.net/teknik-mengirim-long-text-sms-gammu-dengan-query-sql/
                    Smsd::create([
                        'DestinationNumber' => $pendaftar->no_hp,
                        'TextDecoded'       => $pesan,
                        'CreatorID'         => $id,
                    ]);
                }
            }
        }

        // menyimpan data ke  tabel pemberitahuan
        $penerima = [];
        $layanan  = [];
        foreach ($request->pendaftar as $pendaftar) {
            $pendaftar = json_decode($pendaftar);
            array_push($penerima, $pendaftar->nama);
        }
        $penerima = array_filter($penerima, 'strlen');
        $penerima = json_encode(array_values($penerima));
        $layanan  = json_encode($request->layanan);

        ModelPemberitahuan::create([
            'rekrutmen_id' => $id,
            'penerima'     => $penerima,
            'layanan'      => $layanan,
            'pesan'        => $request->pesan,
        ]);
        return redirect('/admin/pendaftar/list/' . $id)->with('message', 'Berhasil Mengirim');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pendaftar = Pendaftar::find($id);
        $pendaftar->data_formulir = json_decode($pendaftar->data_formulir);

        $pendaftar->rekrutmen->data_formulir = json_decode($pendaftar->rekrutmen->data_formulir);


        // foreach($pendaftar->rekrutmen->data_formulir as $data){
        //     print_r($data);
        // }

        // for($i=0, $count = count($pendaftar->data_formulir); $i<$count; $i++) {

        //     print_r($pendaftar->data_formulir[$i]);
        //     print_r($pendaftar->rekrutmen->data_formulir[$i]);
        //    }

        // foreach (array_combine($pendaftar->data_formulir, $pendaftar->rekrutmen->data_formulir) as $data_p => $data_r){
        //     print_r($data_r);
        //     print_r($data_p);


        // }

        return view('admin.edit-pendaftar', ['pendaftar' => $pendaftar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'          => 'required',
            'no_hp'         => 'required',
            'email'         => 'required',
            'data_formulir' => 'required',
        ]);

        //mencari data pendaftar yang mau di update
        $pendaftar     = Pendaftar::findOrFail($id);

        // merubah jenis data dari array ke json
        $data_formulir = json_encode($request->data_formulir);

        $pendaftar->update([
            'nama'          => $request->nama,
            'no_hp'         => $request->no_hp,
            'email'         => $request->email,
            'seleksi'       => $request->seleksi,
            'data_formulir' => $data_formulir,
        ]);

        return redirect('/admin/pendaftar/list/' . $pendaftar->rekrutmen_id)->with('message', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftar = Pendaftar::find($id);
        File::delete(storage_path('app/public/foto/' . $pendaftar->foto));
        Pendaftar::destroy($id);
        return back()->with('message', 'Berhasil Dihapus');
    }

    public function destroy_rev($id)
    {
        try {
            File::delete(storage_path('app/public/foto/' . $pendaftar->foto));
            Pendaftar::destroy($id);
            return back()->with('message', 'Berhasil Dihapus');
        } catch (Exception $exc) {
            return redirect('/admin/rekrutmen/')->with('message', 'Gagal Dihapus');
        }
    }
}
