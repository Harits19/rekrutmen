<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\EmailForQueuing;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    // public function handle()
    // {
    //     $email = new EmailForQueuing();
    //     Mail::to($this->details['email'])->send($email);
    // }

    public function handle()
    {
        foreach ($this->details as $value) {
            $email = new EmailForQueuing();
            Mail::to($value)->send($email);          }

    }

    // public function handle()
    // {
    //     $emails = EmailList::get(['email']);

    //     foreach ($emails as $email) {
    //         Mail::to($email)->send();
    //     }
    // }
}
