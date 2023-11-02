<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafowarningpolygon extends Model
{
    use HasFactory;

    public function cafowarning()
    {
        return $this->belongsTo(Cafowarning::class);
    }


}
