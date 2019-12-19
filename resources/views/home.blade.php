@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in, <strong>{{ Auth::user()->name }}</strong></p>
                    <p>Email: <strong>{{ Auth::user()->email }}</strong></p>
                    {{-- <p><a href="/send">Send me email</a></p> --}}
                    
                    <?php use Carbon\Carbon; 
                    $requestEmail = App\Requests::where('client_email', Auth::user()->email)->get();
                    $lastRequest = App\Requests::where('client_email', Auth::user()->email)
                        ->orderBy('created_at', 'desc')
                        ->pluck('created_at')
                        ->first();
                        
                    $date = Carbon::now();
                    $diff = $date->diffInHours($lastRequest); ?>

                    @if ( Auth::user()->admin == 1 )
                        <p>You are admin</p>
                        <a href="/requests" class="btn btn-primary">Requests</a>
                    @endif
                    @if ( Auth::user()->admin == 0 )
                        <p>Количество запросов: {{count($requestEmail)}}</p>
                        @if (count($requestEmail) == 0 || $diff >= 24)
                            <form action="/requests/new_request" method="POST">
                                {{csrf_field()}}
                                <div class="input-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="input-group">
                                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="input-group input-group-btn">
                                    <input type="submit" class="btn btn-primary" value="Send">
                                </div>
                            </form>
                        @else
                            <p>Last request: <strong>{{$diff}}</strong> hours ago.</p>
                            <p>You can make your next request in {{24 - $diff}} hours</p>
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
