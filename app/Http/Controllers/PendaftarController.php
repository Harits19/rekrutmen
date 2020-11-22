<?php

namespace App\Http\Controllers;

use App\Mail\Pemberitahuan as MailPemberitahuan;
use App\Models\Pemberitahuan as ModelPemberitahuan;
use App\Models\Konfirmasi;
use App\Models\Pendaftar;
use App\Models\Rekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;




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
            $data->data_formulir = json_decode($data->data_formulir);

            foreach (array_combine($data->rekrutmen->data_formulir, $data->data_formulir) as $data_r => $data_p) {
                array_push($values, ['key' => $data_r, 'value' => $data_p]);
            }

            $nama_rekrutmen = $data->rekrutmen->nama;
            $nama = $data->nama;
            $email = $data->email;
            $no_hp = $data->no_hp;

            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('biodata_pendaftar.docx'));
            $template->setValue('nama_rekrutmen', $nama_rekrutmen);
            $template->setValue('nama', $nama);
            $template->setValue('email', $email);
            $template->setValue('no_hp', $no_hp);
            $template->setImageValue('foto', array('path' => public_path('poster/81.jpg'), 'width' => 120, 'height' => 150, 'ratio' => false));

            $template->cloneRowAndSetValues('key', $values);
            $filename = $data->id . ". " . $nama . ".docx";
            header('Content-Type: application/octet-stream');
            header("Content-Disposition: attachment; filename=$filename");
            // $template->saveAs(storage_path('biodata/test.docx', true)); //untuk download langsung 
            $template->saveAs(storage_path('biodata/temp/' . $filename));
            // break;
        }


        // //membuat zip file
        $zip_file = $pendaftar[0]->rekrutmen->nama . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('biodata/temp');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file) {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = 'biodata/' . substr($filePath, strlen($path) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        File::deleteDirectory(storage_path('biodata/temp'));
        return response()->download($zip_file);
    }

    public function index()
    {
        $organisasi = Auth::user();
        $rekrutmen = Rekrutmen::where('organisasi_id', $organisasi->id)->orderBy('created_at', 'DESC')->withCount('pendaftar')->get();

        return view('admin.pendaftar', ['rekrutmen' => $rekrutmen]);
    }


    public function list($id)
    {
        $pendaftar = Pendaftar::where('rekrutmen_id', $id)->get();
        $pemberitahuan = ModelPemberitahuan::where('rekrutmen_id', $id)->get();
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
            foreach ($request->layanan as $layanan) {

                if ($layanan == 'whatsapp') {
                }
                if ($layanan == 'email') {
                    foreach ($request->pendaftar as $pendaftar) {

                        $random_hash = bin2hex(random_bytes(32));
                        $pesan       = $request->pesan . " Silahkan klik link berikut ini untuk melakukan konfirmasi kehadiran <a href='http://rekrutmen.fia/konfirmasi/" . $random_hash . "'>http://rekrutmen.fia/konfirmasi/" . $random_hash . "</a>";
                        $pendaftar   = json_decode($pendaftar);
                        Mail::to($pendaftar->email)->queue(new MailPemberitahuan($pendaftar, $pesan));

                        //masukkan kode ke database
                        Konfirmasi::create([
                            'pendaftar_id' => $pendaftar->id,
                            'kode' => $random_hash,
                        ]);

                        //update status pendaftar menjadi proses konfirmasi
                        $pendaftar = Pendaftar::findOrFail($pendaftar->id);
                        $pendaftar->update([
                            'status' => 'proses konfirmasi',
                        ]);
                    }
                }
                if ($layanan == 'sms') {
                }
            }
        } else {
            foreach ($request->layanan as $layanan) {
                if ($layanan == 'whatsapp') {
                }
                if ($layanan == 'email') {
                    foreach ($request->pendaftar as $pendaftar) {
                        $pendaftar = json_decode($pendaftar);
                        Mail::to($pendaftar->email)->queue(new MailPemberitahuan($pendaftar, $request->pesan));
                    }
                }
                if ($layanan == 'sms') {
                }
            }
        }

        // foreach($request->pendaftar as $pendaftar){

        // }

        $penerima = [];
        $layanan = [];
        foreach ($request->pendaftar as $pendaftar) {
            // print_r($pendaftar);
            $pendaftar = json_decode($pendaftar);
            // print_r($pendaftar->nama);
            array_push($penerima, $pendaftar->nama);
        }
        $penerima = array_filter($penerima, 'strlen');
        $penerima = json_encode(array_values($penerima));
        $layanan = json_encode($request->layanan);

        ModelPemberitahuan::create([
            'rekrutmen_id' => $id,
            'penerima' => $penerima,
            'layanan' => $layanan,
            'pesan' => $request->pesan,
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
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);
        // Tambahkan jika dibutuhkan
        // 'data_formulir' => 'required',
        $pendaftar = Pendaftar::findOrFail($id);

        // merubah jenis data dari array ke json
        $data_formulir = json_encode($request->data_formulir);

        $pendaftar->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
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
        Pendaftar::destroy($id);
        return back()->with('message', 'Berhasil Dihapus');
    }
}
