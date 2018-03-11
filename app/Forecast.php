<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\API\OpenWeather;

use Carbon\Carbon;

class Forecast extends Model
{
    protected $fillable = ['description'];

    public static function forecast_weather($request){


        $api = OpenWeather::forecast()->city($request->city)->units($request->units)->language($request->language)->get();

        return $api;
      }
    }
