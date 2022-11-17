<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'station_id',
        'name',
        'image', 
        'description'
    ];
}
