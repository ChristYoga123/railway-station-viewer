<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'train_id',
        'station_id',
        'arrival_time',
        'late_time',
        'delay_time'
    ];
}
