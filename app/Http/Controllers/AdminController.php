<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function dashboard()
    {

        // $blog = Admin::all();
        // // return view('blog', ['blog' => $pegawai]);
        // return view('homepage.homepage', ['blog' => $blog]);
        // $blog = Admin::all();
        // return view('blog', ['blog' => $pegawai]);
        return view('admin.dashboard');
    }

    public function create_form()
    {

        // $blog = Admin::all();
        // // return view('blog', ['blog' => $pegawai]);
        // return view('homepage.homepage', ['blog' => $blog]);
        // $blog = Admin::all();
        // return view('blog', ['blog' => $pegawai]);
        return view('admin.create_form');
    }

    public function detail($id)
    {
        $blog = Admin::find($id);
        return view('homepage.detail_pendaftaran', ['blog' => $blog]);
    }

    public function form($id)
    {
        $blog = Admin::find($id);
        return view('homepage.form_pendaftaran', ['blog' => $blog]);
    }
}
