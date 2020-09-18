<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function store_data(Request $request)
    {


        
        $data = array($request->only('data'));
        
        $test['data'] = json_encode($data);
        // $test['data'] = implode(",", $data);
        Pendaftar::insert($test);
        
        return redirect('/admin/dashboard');
    }
}
