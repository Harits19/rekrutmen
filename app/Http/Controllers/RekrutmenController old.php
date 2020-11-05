<?php

namespace App\Http\Controllers;

use App\Models\Rekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekrutmenController extends Controller
{

    
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'organisasi_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'poster' => 'required',
            'status' => 'required',

        ]);

        //fungsi eloquent untuk menambah data
        Rekrutmen::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        // return redirect()->route('admin.rekrutmen');

        // $id = DB::table('rekrutmen')->insertGetId(
        //     ['nama' => 'test', 'organisasi_id' => 1]
        // );
        print_r('Berhasil');
    }

    //
    // public function store(Request $request)
    // {
    //     //melakukan validasi data
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     //fungsi eloquent untuk menambah data
    //     User::create($request->all());

    //     //jika data berhasil ditambahkan, akan kembali ke halaman utama
    //     return redirect()->route('users.index')
    //         ->with('success', 'User Berhasil Ditambahkan');
    // }

    // public function show($id)
    // {
    //     //menampilkan detail data dengan menemukan/berdasarkan id user
    //     $user = User::find($id);
    //     return view('users.detail', compact('user'));
    // }

    // public function edit($id)
    // {
    //     //menampilkan detail data dengan menemukan/berdasarkan id user untuk diedit
    //     $user = User::find($id);
    //     return view('users.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     //melakukan validasi data
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     //fungsi eloquent untuk mengupdate data inputan kita
    //     User::find($id)->update($request->all());

    //     //jika data berhasil diupdate, akan kembali ke halaman utama
    //     return redirect()->route('users.index')
    //         ->with('success', 'User Berhasil Diupdate');
    // }

    // public function destroy($id)
    // {
    //     //fungsi eloquent untuk menghapus data
    //     User::find($id)->delete();
    //     return redirect()->route('users.index')
    //         ->with('success', 'User Berhasil Dihapus');
    // }
}
