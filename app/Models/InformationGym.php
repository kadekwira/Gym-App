<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationGym extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_name',
        'gym_location',
        'open_operational',
        'close_operational',
        'operational_time',
    ];
}
