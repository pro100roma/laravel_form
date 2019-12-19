@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home" type="button" class="btn btn-default">Home</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title m-b-md">Requests</h1>
            <div class="card">
                <ul class="list-group">
                    @foreach ($requests as $request)
                        <li class="list-group-item">
                            <a href="/requests/{{$request->id}}">{{$request->subject}}</a> | 
                            <a href="/requests/{{$request->id}}">{{$request->client_email}}</a> | 
                            {{$request->created_at}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection