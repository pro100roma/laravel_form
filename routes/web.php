<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('send', 'mailController@send');
Route::post('/requests/new_request', 'requestController@formSubmit');

Route::get('/requests', function () {
    //$requests = DB::table('requests')->get();
    $requests = App\Requests::all();
    return view('requests.index', compact('requests'));
});

Route::get('/requests/{request}', function ($id) {
    //$request = DB::table('requests')->find($id);
    $request = App\Requests::find($id);
    return view('requests.show', compact('request'));
});

