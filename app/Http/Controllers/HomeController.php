<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;
use App\Forecast;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      return view('home');

    }

    public function weather_show(Request $request){
      if ($request->button == 'Current!') {
        $result = Weather::current_weather($request);
        return view('weather', ['weather' => $result]);
      } elseif ($request->button == 'Forecast!') {
        $result = Forecast::forecast_weather($request);
        // dd($result);
        return view('forecast', ['forecast' => $result]);
      }


    }

}
