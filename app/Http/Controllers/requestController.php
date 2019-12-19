<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Requests, Auth;

class requestController extends Controller
{
    ////This method is to process the form
public function formSubmit(Request $request) {

    // DB::table('requests')->insert([
    //     'subject' => $request->subject,
    //     'body' => $request->message
    // ]);

    $req = new \App\Requests;
    $req->subject = $request->input('subject');
    $req->body = $request->input('message');
    $req->client_name = Auth::user()->name;
    $req->client_email = Auth::user()->email;
    $req->save();

    //return Redirect::back();

    return view('requests.new_request');

}
}
