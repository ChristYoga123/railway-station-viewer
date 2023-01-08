<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function StartStation()
    {
        return $this->belongsTo(Station::class, "station_start_id");
    }

    public function EndStation()
    {
        return $this->belongsTo(Station::class, "station_end_id");
    }
}
