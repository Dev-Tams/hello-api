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
     * @param string $name requests the user name
     * @param int $suerIp fetches user Ip 
     * @response 200
     *
     */


    public function store(Request $request)
    {
        $name = $request->string("name")->trim();
        $userIp = $request->ip();

      //Use  google ip when testing in local host
       // $userIp = '8.8.8.8'; 

        $location = Http::get("https://ipapi.co/{$userIp}/json/");
        $locationData = $location->json();
         $city = $locationData ['city'];

       $temperature = $this->getWeather($city) ?? "Cant find accurate temp for this location";
       $weatherData = $this->getWeather($city);
    
         return response()->json([
            "user_ip" => $userIp,
            "location" => $city,
            "name" =>  $name,
            'weatherData' => $weatherData,

         ]);
    }
    
  /**
     * This endpoint fetches  user weather info by by city 
     * It returns an array of available data from the API.
     * @param string $city The name of the city to fetch the weather for.
     * @return array An array containing the weather data.
     * @response 200
     *
     */

    private function getWeather($city)
 {
       $apiKey =env('WEATHER_API_KEY');

        $weather = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}");

        $weatherData = $weather->json();
        
        if($city == null){
            return(' Location not found, please try again');
        }
        else{ 
        return [
            'coordinates' => [
                'lon' => $weatherData['coord']['lon'] ?? 'N/A',
                'lat' => $weatherData['coord']['lat'] ?? 'N/A'
            ],
            'weather' => [
                'main' => $weatherData['weather'][0]['main'] ?? 'N/A',
                'description' => $weatherData['weather'][0]['description'] ?? 'N/A',
                'icon' => $weatherData['weather'][0]['icon'] ?? 'N/A'
            ],
            'temperature' => $weatherData['main']['temp'] ?? 'N/A',
            'feels_like' => $weatherData['main']['feels_like'] ?? 'N/A',
            'temp_min' => $weatherData['main']['temp_min'] ?? 'N/A',
            'temp_max' => $weatherData['main']['temp_max'] ?? 'N/A',
            'pressure' => $weatherData['main']['pressure'] ?? 'N/A',
            'humidity' => $weatherData['main']['humidity'] ?? 'N/A',
            'visibility' => $weatherData['visibility'] ?? 'N/A',
            'wind' => [
                'speed' => $weatherData['wind']['speed'] ?? 'N/A',
                'deg' => $weatherData['wind']['deg'] ?? 'N/A'
            ],
            'clouds' => $weatherData['clouds']['all'] ?? 'N/A',
            'sunrise' => $weatherData['sys']['sunrise'] ?? 'N/A',
            'sunset' => $weatherData['sys']['sunset'] ?? 'N/A',
            'timezone' => $weatherData['timezone'] ?? 'N/A',
            'city_name' => $weatherData['name'] ?? 'N/A',
            'country' => $weatherData['sys']['country'] ?? 'N/A'
        ];
  
      }
}
}
