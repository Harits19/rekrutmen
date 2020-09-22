<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    //
    public function send_sms()
    {
        $users = DB::connection('mysql2')->select("asd");
        DB::insert('INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES (?, )', array('085866927217', 'Tes kirim SMS dari database', 'agusph'));

        # code...
    }
}
