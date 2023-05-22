<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AfternoonPolygon extends Model
{
    use HasFactory;


    // Define relationships 
public function add_daily_forecasts()
{
    return $this->belongsTo(AddDailyForecast::class);
}

}