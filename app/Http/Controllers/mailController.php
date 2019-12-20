<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail, Auth;

class mailController extends Controller
{
    public function send() {
        $to_name =  'Admin';
        $to_email = 'chronos945@mail.ru';
        $data = array('name'=>'UserName', "body" => "Test email");
        Mail::send(['text' => 'mail'], $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Web Testing Mail');
            $message->from('chronos945@gmail.com', 'Artisans Web');
        });
        // Mail::send(['text' => 'mail'], ['name', 'web dev blog'], function($message) {
        //     $message->to('chronos945@gmail.com', 'Test mail')->subject('Test email');
        //     $message->from('chronos945@gmail.com', 'web web web');
        // });
    }
}
