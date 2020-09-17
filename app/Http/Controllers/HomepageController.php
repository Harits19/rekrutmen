<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //
    public function index()
    {

        $blog = Blog::all();
        // return view('blog', ['blog' => $pegawai]);
        return view('homepage.homepage', ['blog' => $blog]);
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        return view('homepage.detail_pendaftaran', ['blog' => $blog]);
    }

    public function form($id)
    {
        $blog = Blog::find($id);
        return view('homepage.form_pendaftaran', ['blog' => $blog]);
    }
}
