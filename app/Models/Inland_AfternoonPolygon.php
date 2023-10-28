<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inland_AfternoonPolygon extends Model
{
    use HasFactory;
    
    public function inland_forecasts()
    {
        return $this->belongsTo(InlandForecast::class);
    }


}
