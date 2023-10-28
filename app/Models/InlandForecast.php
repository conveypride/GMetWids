<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InlandForecast extends Model
{
    use HasFactory;

       // Define relationships 
 
public function inlandmorning_general_variables()
{
    return $this->hasMany(Inland_Morning_general_variables::class);
}

public function inlandafternoon_general_variables()
{
    return $this->hasMany(Inland_Afternoon_general_variables::class);
}

public function inlandevening_general_variables()
{
    return $this->hasMany(Inland_Evening_general_variables::class);
}

public function inlandmorning_table_values()
{
    return $this->hasMany(Inland_Morning_table_values::class);
}

public function inlandafternoon_table_values()
{
    return $this->hasMany(Inland_Afternoon_table_values::class);
}

public function inlandevening_table_values()
{
    return $this->hasMany(Inland_Evening_table_values::class);
}

public function inlandmorning_markers()
{
    return $this->hasMany(Inland_MorningMarkers::class);
}

public function inlandafternoon_markers()
{
    return $this->hasMany(Inland_AfternoonMarkers::class);
}

public function inlandevening_markers()
{
    return $this->hasMany(Inland_EveningMarkers::class);
}

public function inlandmorning_polygons()
{
    return $this->hasMany(Inland_MorningPolygon::class);
}

public function inlandafternoon_polygons()
{
    return $this->hasMany(Inland_AfternoonPolygon::class);
}

public function inlandevening_polygons()
{
    return $this->hasMany(Inland_EveningPolygon::class);
}


}
