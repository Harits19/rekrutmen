<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\Models\Form;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;



class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $pendaftar = Pendaftar::All();
        $form = Form::find(20);
        // $form->data = json_decode($form->data);
        return view('admin.dashboard', ['pendaftar' => $pendaftar], ['form' => $form]);
    }

    public function rekrutmen()
    {
        // $pendaftar = Pendaftar::All();
        // $form = Form::find(20);
        // $form->data = json_decode($form->data);
        return view('admin.rekrutmen');
    }

    public function tambah()
    {
        // $pendaftar = Pendaftar::All();
        // $form = Form::find(20);
        // $form->data = json_decode($form->data);
        return view('admin.tambah-rekrutmen');
    }

    public function pendaftar()
    {
        // $pendaftar = Pendaftar::All();
        // $form = Form::find(20);
        // $form->data = json_decode($form->data);
        return view('admin.pendaftar');
    }

    public function list($id)
    {
        // $pendaftar = Pendaftar::All();
        // $form = Form::find(20);
        // $form->data = json_decode($form->data);
        return view('admin.list-pendaftar');
    }

    public function pemberitahuan()
    {
        // $pendaftar = Pendaftar::All();
        // $form = Form::find(20);
        // $form->data = json_decode($form->data);
        return view('admin.kirim-pemberitahuan-pendaftar');

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
        $test['nama'] = "Uji Coba";
        $data = $request->only('data');

        // dengan json
        $test['data'] = json_encode($data);

        // $test['data'] = array($data);
        print_r($test['data']);
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

    public function send_message(Request $request)
    {
        // $data = $request->only('id_list', 'textarea_message');
        print_r($request->id_list);
        foreach ($request->id_list as $d) {
            // echo $d;
            // Cari ID Pendaftar di table Pendaftar
            $data_pendaftar = Pendaftar::find($d);
            echo $data_pendaftar->nama;

            //Kirim email
            $to_name = 'harits';
            $to_email = 'harits.abdullah19@gmail.com';
            $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "A test mail untuk".$data_pendaftar->nama);
            Mail::send('mail', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Laravel Test Mail');
                $message->from('bentzie19@gmail.com', 'Test Mail');
            });

            //Kirim SMS
            DB::connection('mysql2')->insert('INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES (?, ?, ?)', array('083840493135', ($request->textarea_message . "Pesan untuk Saudara " . $data_pendaftar->nama." ".$request->textarea_message), 'agusph'));
        
            //Kirim Whatsapp
            //Coming Soon...
        }

        print_r($request->textarea_message);
    }
}
