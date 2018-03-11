@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Weather for {{$forecast->city->name}}</div>
                <a href="{{ route('home')}}" class="btn btn-primary" > Back! </a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <p>
                  <table class="table">
                    <thead>
                      <tr>
                        <td>Date</td>
                        <td>Temp</td>
                        <td>Hum</td>
                        <td>icon</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($forecast->list as $list)
                      <tr>
                        <td>{{$list->dt_txt}}</td>
                        <td>{{$list->main->temp}}</td>
                        <td>{{$list->main->humidity}}</td>
                        <td><img src="http://openweathermap.org/img/w/{{$list->weather[0]->icon}}.png" alt></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
