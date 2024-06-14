<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\FetchWeatherData;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\FetchWeatherData::class,
    ];



    protected function schedule(Schedule $schedule)
    {
        $cities = ['Skopje', 'Ohrid', 'Gevgelija']; // Replace with actual city names
        foreach ($cities as $city) {
            $schedule->command("weather:fetch {$city}")->everyMinute();
        }
    }
}
