<?php

namespace App\Http\Controllers;

use App\Models\Pemberitahuan;
use App\Models\Pendaftar;
use App\Models\Rekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;



class RekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $id = Auth::user()->id;
        $rekrutmen = Rekrutmen::where('organisasi_id', $id)->orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.rekrutmen', ['rekrutmen' => $rekrutmen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.buat-rekrutmen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'organisasi_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'poster' => 'required',
            'status' => 'required',
        ]);

        // filter jika user membuat formulir
        if ($request->data_formulir != '') {
            $data_formulir = array_filter($request->data_formulir, 'strlen');
            $data_formulir = json_encode(array_values($data_formulir));
        } else {
            $data_formulir = $request->data_formulir;
            $data_formulir = json_encode($data_formulir);
        }

        $id = Rekrutmen::insertGetId([
            'organisasi_id' => $request->organisasi_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'data_formulir' => $data_formulir,
        ]);

        $string_poster = $id . '.' . $request->poster->getClientOriginalExtension();
        $request->poster->move(public_path('poster'), $string_poster);

        $rekrutmen = Rekrutmen::findOrFail($id);
        $rekrutmen->update([
            'poster' => $string_poster,
        ]);

        return redirect('admin/rekrutmen')->with('message', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekrutmen = Rekrutmen::find($id);
        return view('admin.edit-rekrutmen', ['rekrutmen' => $rekrutmen]);
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
        $this->validate($request, [

            'organisasi_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        //get data Rekrutmen by ID
        $rekrutmen = Rekrutmen::findOrFail($id);

        if ($request->file('poster') == "") {
            $rekrutmen->update([
                'organisasi_id' => $request->organisasi_id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
            ]);
        } else {
            //hapus old image
            File::delete(public_path('poster/' . $rekrutmen->poster));

            //upload new image
            $string_poster = $rekrutmen->id . '.' . $request->poster->getClientOriginalExtension();
            $request->poster->move(public_path('poster'), $string_poster);

            $rekrutmen->update([
                'organisasi_id' => $request->organisasi_id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'poster' => $string_poster,
                'status' => $request->status,
            ]);
        }

        if ($rekrutmen) {
            return redirect('admin/rekrutmen')->with(['message' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect('admin/rekrutmen')->with(['message' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data pendaftar yang where rekrutmen_id = id
        $pendaftar = Pendaftar::where('rekrutmen_id', $id)->get();
        foreach ($pendaftar as $pendaftar) {
            File::delete(storage_path('app/public/foto/' . $pendaftar->foto));
            Pendaftar::destroy($pendaftar->id);
        }

        Pemberitahuan::where('rekrutmen_id', $id)->delete();

        $rekrutmen = Rekrutmen::find($id);
        File::delete(public_path('poster/' . $rekrutmen->poster));
        Rekrutmen::destroy($id);

        return redirect('admin/rekrutmen')->with('message', 'Berhasil Dihapus');
    }

    public function test()
    {


        if (File::exists(public_path('poster/67.jpg'))) {

            File::delete(public_path('poster/67.jpg'));
        } else {

            dd('File does not exists.');
        }
    }
}
