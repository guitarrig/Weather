<?php

 namespace App\API;

 use GuzzleHttp\Client;


 class OpenWeather{

   private $client, $url;

   private function __construct($base_url) {

     $this->client = new Client();
     $this->url = $base_url . '?appid='. env('OW_KEY');


   }

   public static function current(){
     return  new self('http://api.openweathermap.org/data/2.5/weather');
   }
   public static function forecast(){
     return new self('http://api.openweathermap.org/data/2.5/forecast');
   }

   public function city($city){
     $this->url = $this->url . '&q=' . $city;
     return $this;
   }

   public function units($units){
     $this->url = $this->url . '&units=' . $units;
     return $this;
   }

   public function language($languare){
     $this->url = $this->url . '&lang=' . $languare;
     return $this;
   }

   public function get(){

     $result = $this->client->request('GET', $this->url);
     return json_decode((string)$result->getBody());
   }
 }
