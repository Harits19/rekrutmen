<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\Models\Form;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Redirect;


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

    // public function detail($id)
    // {
    //     $blog = Admin::find($id);
    //     return view('homepage.detail_pendaftaran', ['blog' => $blog]);
    // }

    // public function form($id)
    // {
    //     $blog = Admin::find($id);
    //     return view('homepage.form_pendaftaran', ['blog' => $blog]);
    // }

    public function store_form(Request $request)
    {


        // $this->validate($request, [
        //     'data' => 'required'
        // ]);

        // Form::create([
        //     'data' => $request->data,
        // ]);

        // $data = $request->only('data[]');
        // $data = implode(",", $data);


        $test['token'] = time();
        $data = array($request->only('data'));
        
        $test['data'] = json_encode($data);
        // $test['data'] = implode(",", $data);
        Form::insert($test);
        // return Redirect::to("dynamic");
        // return Redirect::to("json")->withSuccess('Great! Successfully store data in json format in datbase');

        return redirect('/admin/dashboard');
    }

    public function store_data(Request $request)
    {


        // $this->validate($request, [
        //     'data' => 'required'
        // ]);

        // Form::create([
        //     'data' => $request->data,
        // ]);

        // $data = $request->only('data[]');
        // $data = implode(",", $data);


        // $test['token'] = time();
        $data = array($request->only('data'));
        
        $test['data'] = json_encode($data);
        // $test['data'] = implode(",", $data);
        Pendaftar::insert($test);
        // return Redirect::to("dynamic");
        // return Redirect::to("json")->withSuccess('Great! Successfully store data in json format in datbase');

        return redirect('/admin/dashboard');
    }
}
