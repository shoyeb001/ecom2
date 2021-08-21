<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\contact;

class mail extends Controller
{
    public function mail(Request $request){
        $name = $request->input('name');
        $subject = $request->input('subject');
        $msg = $request->input('message');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $to_email = "devstacksolution@gmail.com";
        $to_name = $email;


        $details = ['name'=>$name, 
        'msg'=>$msg, 
        'from'=>$email
        ];
        \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\contact($details));
   
        dd("Email is Sent.");

    }
}
