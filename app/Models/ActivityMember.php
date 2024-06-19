<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityMember extends Model
{
    use HasFactory;

    protected $table= 'activities';
    protected $fillable = [
        'user_id',
        'date',
        'check_in',
        'check_out',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
