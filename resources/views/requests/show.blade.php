@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/requests" type="button" class="btn btn-default">All requests</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <p>Request ID: {{ $request->id }}</p>
                <p>Name: {{ $request->client_name}}</p>
                <p>Email: {{ $request->client_email }}</p>
                <p>Subject: {{ $request->subject }}</p>
                <p>Message: {{ $request->body }}</p>
                <p>Uploaded <a href="file:///{{ $request->file }}" download>file</a></p>
                <p>Creation time: {{ $request->created_at }}</p>
            </div>
        </div>
    </div>
</div>
@endsection