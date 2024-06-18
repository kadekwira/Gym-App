<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassBooking extends Model
{
    use HasFactory;
    protected $table = 'class_bookings';
    protected $fillable = [
        "class_id",
        "user_id",
        "booking_date",
        "status"
    ];


    public function class()
    {
        return $this->belongsTo(Kelas::class, 'class_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
