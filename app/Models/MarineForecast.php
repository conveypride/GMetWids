<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarineForecast extends Model
{
    use HasFactory;

    // Define relationships 
 
    
    public function marine_polygons()
    {
        return $this->hasMany(MarinePolygons::class);
    }

public function marine_markers()
    {
        return $this->hasMany(MarineMarkers::class);
    }


    
}
