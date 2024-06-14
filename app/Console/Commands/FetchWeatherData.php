<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherService;
use App\Models\Weather;

class FetchWeatherData extends Command
{
    protected $signature = 'weather:fetch {city}';
    protected $description = 'Fetch weather data for a specific city';

    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle()
    {
        $city = $this->argument('city');
        $data = $this->weatherService->getWeatherByCity($city);

        Weather::create([
            'city' => $city,
            'temperature' => $data['main']['temp'],
            'humidity' => $data['main']['humidity'],
            'description' => $data['weather'][0]['description']
        ]);

        $this->info('Weather data fetched and stored successfully.');
    }
}
