<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = ['city', 'temperature', 'humidity', 'description'];

    // Define any additional methods or relationships here
}
