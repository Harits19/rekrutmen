<?php

namespace App\Http\Controllers;

use App\Mail\Pemberitahuan;
use App\Models\Pendaftar;
use App\Models\Rekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisasi = Auth::user();
        $rekrutmen = Rekrutmen::where('organisasi_id', $organisasi->id)->orderBy('created_at', 'DESC')->withCount('pendaftar')->get();

        return view('admin.pendaftar', ['rekrutmen' => $rekrutmen]);
    }


    public function list($id)
    {
        $pendaftar = Pendaftar::where('rekrutmen_id', $id)->get();
        return view('admin.list-pendaftar', ['pendaftar' => $pendaftar]);
        //
    }

    public function pemberitahuan(Request $request, $id)
    {
        // print_r($id);

        // foreach ($request->checkbox as $data) {
        //     $data = json_decode($data);
        //     print_r($data->nama);
        // }

        $request->validate([
            'checkbox' => 'required',
        ]);

        $pendaftar = $request->checkbox;
        return view('admin.kirim-pemberitahuan-pendaftar', ['pendaftar' => $pendaftar]);
    }

    public function kirim(Request $request, $id)
    {
        // $request->validate([
        //     'pendaftar' => 'required',
        //     'layanan' => 'required',
        //     'pesan' => 'required',
        // ]);

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


        foreach ($request->layanan as $layanan) {
            if ($layanan == 'whatsapp') {
                // print_r("whatsapp");
            }
            if ($layanan == 'email') {
                // print_r("email");
                foreach ($request->pendaftar as $pendaftar) {
                    $pendaftar = json_decode($pendaftar);
                    Mail::to($pendaftar->email)->queue(new Pemberitahuan($pendaftar, $request->pesan));
                }
            }
            if ($layanan == 'sms') {
                // print_r("sms");
            }
        }

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
