<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafodistricts extends Model
{
    use HasFactory;

    protected $fillable = [
        'districtname',
        'districtZone',
        'user',
    ];

  



}
