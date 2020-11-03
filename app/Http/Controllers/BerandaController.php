<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function index()
    {

        // $blog = Blog::all();
        // return view('blog', ['blog' => $pegawai]);
        // return view('homepage.homepage', ['blog' => $blog]);
        return view('beranda.beranda');
    }

    public function detail($id)
    {
        // $blog = Blog::find($id);
        // return view('homepage.detail_pendaftaran', ['blog' => $blog]);
        return view('beranda.detail');
    }

    public function form($id)
    {
        // $blog = Blog::find($id);
        // $form = Form::find(28);     

        // $form = json_decode( $form->data);
        // // $form =$form->id;


        // return view('homepage.form_pendaftaran', ['blog' => $blog], ['form' => $form]);
        return view('beranda.form');
    }
}
