<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FormController extends Controller
{
    //
    public function json()
    {
        // return view('form-json');
        return view('form-json');
    }

    public function store_json(Request $request)
    {
        $data = $request->only('name', 'email');
        $test['token'] = time();
        $test['data'] = json_encode($data);
        Form::insert($test);
        return Redirect::to("json")->withSuccess('Great! Successfully store data in json format in datbase');
    }

    public function dynamic()
    {
        // return view('form-json');
        return view('form-dynamic');
    }

    public function store_dynamic(Request $request)
    {
        $data = $request->only('name', 'email');
        $test['token'] = time();
        $test['data'] = json_encode($data);
        Form::insert($test);
        // return Redirect::to("dynamic");
        return Redirect::to("json")->withSuccess('Great! Successfully store data in json format in datbase');

    }

    public function form_view()
    {
        # code...
        $form = Form::select('data')->get();
        // $form = Form::select('id');
        echo(gettype($form));

        echo($form);
        // $form = json_decode($form, TRUE);
        // echo(gettype($form));
        // foreach ($form as $d) {
        //     # code...
        //     echo($d);

        // }
        foreach($form as $x => $val) {
            echo "$x = $val<br>";
          }


        // return view('form', ['form' => $form]);
        // return view('form');

    }

}
