<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Form;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Redirect;
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
        $form = Form::find(28);     

        $form = json_decode( $form->data);
        // $form =$form->id;


        return view('homepage.form_pendaftaran', ['blog' => $blog], ['form' => $form]);
    }

    // public function store_data(Request $request)
    // {

    //     $data = array($request->only('data'));
    //     $test['data'] = json_encode($data);
    //     // $test['data'] = implode(",", $data);
    //     Pendaftar::insert($test);
    //     return redirect('/');
    // }

    public function store_data(Request $request)
    {


        
        $data = array($request->only('data'));

        $test['nama'] = "Uji Coba";
        $test['no_hp'] = "083840493135";
        $test['email'] = "harits.abdullah19@gmail.com";
        
        $test['data'] = json_encode($data);
        // $test['data'] = implode(",", $data);
        Pendaftar::insert($test);
        
        return redirect('/admin/dashboard');
    }
}
