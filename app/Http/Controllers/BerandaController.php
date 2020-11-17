<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Exception;

use App\Models\Konfirmasi;
use App\Models\Organisasi;
use App\Models\Pendaftar;
use App\Models\Rekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;








class BerandaController extends Controller
{
    //

    public function konfirmasi($kode)
    {

        // print_r($code);
        // $konfirmasi = Konfirmasi::where('kode', $kode)->get();
        $konfirmasi = Konfirmasi::where('kode', $kode);


        if ($konfirmasi->exists()) {
            $konfirmasi = $konfirmasi->get();
            // print($konfirmasi[0]->pendaftar->nama);

            $pendaftar = Pendaftar::findOrFail($konfirmasi[0]->pendaftar->id);
            $pendaftar->update([
                'status' => 'hadir',
            ]);
            return redirect('/')->with('message', 'Berhasil Mengkonfirmasi');
        } else {
            return redirect('/')->with('message', 'Gagal Mengkonfirmasi');
        }
    }

    public function index()
    {

        $rekrutmen = Rekrutmen::all();
        return view('beranda.beranda', ['rekrutmen' => $rekrutmen]);

        // $organisasi = Organisasi::find(24);
        // foreach($organisasi->rekrutmen as $data){
        //     echo $data->poster;
        // }
    }

    public function detail($id)
    {
        $rekrutmen = Rekrutmen::find($id);
        // print_r($rekrutmen);
        return view('beranda.detail', ['rekrutmen' => $rekrutmen]);
    }

    public function form($id)
    {
        $rekrutmen = Rekrutmen::find($id);
        $rekrutmen->data_formulir = json_decode($rekrutmen->data_formulir);
        // foreach($rekrutmen->data_formulir as $data){
        //     print_r($data);
        // }
        // if ($rekrutmen->data_formulir = "null"){
        //     echo "True";
        // }
        return view('beranda.form', ['rekrutmen' => $rekrutmen]);
    }

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'rekrutmen_id' => 'required',
            'foto' => 'required',


        ]);

        // merubah jenis data dari array ke json
        $data_formulir = json_encode($request->data_formulir);

        
        //get next id
        $next_id = DB::select("SHOW TABLE STATUS LIKE 'pendaftar'");
        $next_id = $next_id[0]->Auto_increment;

        //upload file
        $foto = $next_id . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(storage_path('app/public/foto'), $foto);


        Pendaftar::create([
            'nama' => $request->nama,
            'rekrutmen_id' => $request->rekrutmen_id,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'data_formulir' => $data_formulir,
            'status' => '-',
            'foto' => $foto,

        ]);



        return redirect('/')->with('message', 'Data Berhasil Dikirim');
    }

    public function word()
    {
        
    }
}
