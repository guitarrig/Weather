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
                    <form method="post" action="{{ route('weather_show')}}">
                      @method('GET')

                      <p><input type="text" name="city" placeholder="City..."><br>
                      <input type="text" name="units" placeholder="units..."><br>
                      <input type='text' name="language" placeholder="language..."><br></p>
                      <input type="submit" name="button" value="Current!" class="btn btn-primary">
                      <input type="submit" name="button" value="Forecast!" class="btn btn-secondary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
