<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($planAll1)
    {
        $this -> planAll1 =$planAll1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test') 
                    ->with(['planAll1'=>$this->planAll1])
                    ->from('techyamamichi@gamil.com',' TECH.I.S')
                    ->subject('今日の予定');
    }
}
