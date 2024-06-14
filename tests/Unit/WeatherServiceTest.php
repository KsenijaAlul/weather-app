<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Http;

class WeatherServiceTest extends TestCase
{
    public function test_get_weather_by_city()
    {
        Http::fake([
            'api.openweathermap.org/*' => Http::response([
                'main' => ['temp' => 20.5, 'humidity' => 60],
                'weather' => [['description' => 'clear sky']],
            ], 200)
        ]);

        $weatherService = new WeatherService();
        $weather = $weatherService->getWeatherByCity('TestCity');

        $this->assertEquals(20.5, $weather['main']['temp']);
        $this->assertEquals(60, $weather['main']['humidity']);
        $this->assertEquals('clear sky', $weather['weather'][0]['description']);
    }
}