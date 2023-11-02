<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafowarning extends Model
{
    use HasFactory;

    public function cafowarningpolygons()
    {
        return $this->hasMany(Cafowarningpolygon::class);
    }


    public function cafowarningmarker()
    {
        return $this->hasMany(Cafowarningmarker::class);
    }


}
