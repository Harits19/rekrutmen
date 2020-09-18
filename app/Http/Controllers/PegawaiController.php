<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

class PegawaiController extends Controller
{

    public function index()
    {
    	$pegawai = Admin::all();
    	return view('pegawai', ['pegawai' => $pegawai]);
    }

    public function tambah()
    {
    	return view('pegawai_tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required'
    	]);

    	Admin::create([
    		'nama' => $request->nama,
    		'alamat' => $request->alamat
    	]);
  
    	return redirect('/pegawai');
    }

    public function edit($id)
    {
    		$pegawai = Admin::find($id);
    		return view('pegawai_edit', ['pegawai' => $pegawai]);
    }

     public function update($id, Request $request)
    {
    		$this->validate($request,[
	    		'nama' => 'required',
	    		'alamat' => 'required'
	    	]);

    		$pegawai = Admin::find($id);
    		$pegawai->nama = $request->nama;
    		$pegawai->alamat = $request->alamat;
    		$pegawai->save();
    		return redirect('/pegawai');
    }

     public function delete($id)
    {
    		$pegawai = Admin::find($id);
    		$pegawai->delete();
    		return redirect('/pegawai');
    }

}
