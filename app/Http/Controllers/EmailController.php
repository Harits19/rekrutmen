<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function send_email()
    {
        # code...
        $to_name = 'harits';
        $to_email = 'harits.abdullah19@gmail.com';
        $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "A test mail");
        Mail::send('mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Laravel Test Mail');
            $message->from('bentzie19@gmail.com', 'Test Mail');
        });
    }
}
