<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $apiKey = env('OPENWEATHERMAP_API_KEY');
        $city = $request->input('city');

        $client = new Client();
        $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey");

        $data = json_decode($response->getBody(), true);

        $tempMin = isset($data['main']['temp_min']) ? $data['main']['temp_min'] : null;
        $tempMax = isset($data['main']['temp_max']) ? $data['main']['temp_max'] : null;
        $pressure = isset($data['main']['pressure']) ? $data['main']['pressure'] : null;
        $feelsLike = isset($data['main']['feels_like']) ? $data['main']['feels_like'] : null;
        $dateTime = isset($data['dt']) ? date('Y-m-d H:i:s', $data['dt']) : null;

        return view('weather', compact('data', 'tempMin', 'tempMax', 'pressure', 'feelsLike', 'dateTime'));
    }
}
