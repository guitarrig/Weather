<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\API\OpenWeather;

use Carbon\Carbon;

class Weather extends Model
{
    protected $fillable = ['city', 'temp', 'hum', 'icon'];

    public static function current_weather($request){

      $search = self::where('city', $request->city)->where('created_at', '>', Carbon::now()->subHour()->toDateTimeString())->first();

      if ($search) {
        return $search;
      } else {
        $api_weather = OpenWeather::current()->city($request->city)->units($request->units)->language($request->language)->get();
        $new_weather = new self(['city' => $request->city,
                                  'temp' => $api_weather->main->temp,
                                  'hum'  => $api_weather->main->humidity,
                                  'icon' => $api_weather->weather[0]->icon
                                ]);
        $new_weather->save();

        return $new_weather;
      }
    }



    }
