<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'trainer_name',
        'trainer_photo',
        'phone_number',
        'address',
        'experience',
        'email',
    ];

    public function classes()
    {
        return $this->hasMany(Kelas::class, 'trainer_id');
    }
}
