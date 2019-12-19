<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Requests, Auth, Mail;

class requestController extends Controller
{
    ////This method is to process the form
public function formSubmit(Request $request) {

    // DB::table('requests')->insert([
    //     'subject' => $request->subject,
    //     'body' => $request->message
    // ]);

    //Insert data to DB
    $req = new \App\Requests;
    $req->subject = $request->input('subject');
    $req->body = $request->input('message');
    $req->client_name = Auth::user()->name;
    $req->client_email = Auth::user()->email;
    $req->save();

    //Send email to admin
    // $to_name =  Auth::user()->name;
    // $to_email = 'chronos945@mail.ru';//Auth::user()->email;
    // $data = array('name'=>Auth::user()->name, "body" => "Test email");
    // Mail::send(['text' => 'mail'], $data, function($message) use ($to_name, $to_email) {
    //     $message->to($to_email, $to_name)->subject('Web Testing Mail');
    //     $message->from('chronos945@gmail.com', 'Artisans Web');
    // });

    //return Redirect::back();

    return view('requests.new_request');

}
}
