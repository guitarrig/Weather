@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check your weather!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="http://openweathermap.org/img/w/{{$weather->icon}}.png" alt><br>
                    Now in {{$weather->city}} {{$weather->temp}} degrees and humidity is {{$weather->hum}}
                    <form method="get" action="{{ route('home')}}">
                    <input type="submit" value="Back">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
