<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inland_Afternoon_general_variables extends Model
{
    use HasFactory;


// Define relationships 
public function inland_forecasts()
{
    return $this->belongsTo(InlandForecast::class);
}



}