<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrialDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_trial',
        'start_trial',
        'end_trial',
        'phone',
        'full_name',
        'email',
    ];
}
