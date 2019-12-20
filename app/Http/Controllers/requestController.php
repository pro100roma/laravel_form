<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Requests, Auth, Mail;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Filesystem\FilesystemManager;

class requestController extends Controller
{
////This method is to process the form
public function formSubmit(Request $request) {

    //Insert data to DB
    $req = new \App\Requests;
    $req->subject = $request->input('subject');
    $req->body = $request->input('message');
    $req->client_name = Auth::user()->name;
    $req->client_email = Auth::user()->email;
    if($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = 'file' . time() . '.' . $file->getClientOriginalExtension();
        $req->file = $file->move(public_path() . '/uploads', $filename);
        
    }
    
    $req->save();
    

    //Send email to admin
    $to_name =  'Admin';
    $to_email = 'chronos945@mail.ru';
    $data = array(
        'name'=>Auth::user()->name, 
        'email'=>Auth::user()->email, 
        'subject' => $req->subject,
        'body' => $req->body,
        'file_url' => $req->file
    );

    Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('New request');
        $message->from('chronos945@gmail.com', 'Test dashboard');
    });

    //return Redirect::back();

    return view('requests.new_request');

}
}
