<?php

namespace App\Http\Controllers;

use PSpell\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class HelloController extends Controller
{

  /**
     * This endpoint retrieves user city by ip and fetch temp data
     * 
     * 
     * @response 200
     *
     */


    public function store(Request $request)
    {
        $name = $request->string("name")->trim();
        $userIp = $request->ip();

      //Use  google ip when testing in local host
        //$userIp = '8.8.8.8'; 

        $location = Http::get("https://ipapi.co/{$userIp}/json/");
        $locationData = $location->json();
         $city = $locationData ['city'];

       $temperature = $this->getWeather($city) ?? "Cant find accurate temp for this location";

    
         return response()->json([
            "user_ip" => $userIp,
            "location" => $city,
            "message" => "Hey {$name}!, the temperature is {$temperature} degrees Celsius in {$city}"
         ]);
    }

    public function getWeather($city)
 {
        $apiKey =env('WEATHER_API_KEY');

        $weather = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}");

        $weatherData = $weather->json();
        $temperature = $weatherData['main']['temp'] ?? 'N/A';

        return is_array($temperature) ? 'N/A' : $temperature;
    }
}