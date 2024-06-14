<?php
namespace App\Services;

    use Illuminate\Support\Facades\Http;

    class WeatherService
    {
        protected $apiKey;
        protected $baseUrl;

        public function __construct()
        {
            $this->apiKey = env('WEATHER_API_KEY');
            $this->baseUrl = 'http://api.openweathermap.org/data/2.5/weather';
        }

        public function getWeatherByCity($city)
        {
            $response = Http::get($this->baseUrl, [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]);

            return $response->json();
        }
    }