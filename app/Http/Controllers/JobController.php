<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Jobs\SendEmail;

use App\Http\Controllers\Controller;

class JobController extends Controller
{

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    // public function enqueue(Request $request)
    // {
    //     $details = ['email' => 'recipient@example.com'];
    //     SendEmail::dispatchNow($details);
    // }

    public function enqueue(Request $request)
    {
        $details = array('recipient@example.com', 'recipient@example.com', 'recipient@example.com', 'recipient@example.com', 'recipient@example.com');
        SendEmail::dispatchNow($details);
    }

    //controller
    // public function runQueue()
    // {
    //     dispatch(new SendEmail());
    // }
}
