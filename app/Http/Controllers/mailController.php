<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;

class mailController extends Controller
{
    public function send() {
        $to_name =  Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name'=>Auth::user()->name, "body" => "Test email");
        Mail::send(['text' => 'mail'], $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Web Testing Mail');
            $message->from('chronos945@gmail.com', 'Artisans Web');
        });
    }
}
