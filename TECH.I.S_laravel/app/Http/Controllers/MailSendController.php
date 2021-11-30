<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
use App\Mail\SendMail;


class MailSendController extends Controller
{
    //
    public function send(){

        // $data = [];

        // Mail::send('emails.test', $data, function($message){
        //     $message->to('yamamitchi@gmail.com', 'Test')
        //             ->from('yamamitchi@gmail.com','TECH.I.S')
        //             ->subject('This is a test mail');
        // });

        // return redirect('/calendar');


        $to = [
            [
                'email' => 'yamamitchi@gmail.com', 
                'name' => '今週の予定',
            ]
        ];
    
        Mail::to($to)->send(new SendMail());

        return redirect('/calendar');
    }
}
