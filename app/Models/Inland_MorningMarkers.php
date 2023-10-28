<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inland_MorningMarkers extends Model
{
    use HasFactory;



    public function inland_forecasts()
    {
        return $this->belongsTo(InlandForecast::class);
    }

}
