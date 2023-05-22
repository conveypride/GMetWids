<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddDailyForecast extends Model
{
    use HasFactory;
// Define relationships 

public function morning_general_variables()
{
    return $this->hasMany(Morning_general_variables::class);
}

public function afternoon_general_variables()
{
    return $this->hasMany(Afternoon_general_variables::class);
}

public function evening_general_variables()
{
    return $this->hasMany(Evening_general_variables::class);
}

public function morning_table_values()
{
    return $this->hasMany(Morning_table_values::class);
}

public function afternoon_table_values()
{
    return $this->hasMany(Afternoon_table_values::class);
}

public function evening_table_values()
{
    return $this->hasMany(Evening_table_values::class);
}

public function morning_markers()
{
    return $this->hasMany(MorningMarkers::class);
}

public function afternoon_markers()
{
    return $this->hasMany(AfternoonMarkers::class);
}

public function evening_markers()
{
    return $this->hasMany(EveningMarkers::class);
}

public function morning_polygons()
{
    return $this->hasMany(MorningPolygon::class);
}

public function afternoon_polygons()
{
    return $this->hasMany(AfternoonPolygon::class);
}

public function evening_polygons()
{
    return $this->hasMany(EveningPolygon::class);
}


    
}
