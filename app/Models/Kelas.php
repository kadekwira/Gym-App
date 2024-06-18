<?php

namespace App\Models;


use App\Models\Trainer;
use App\Models\ClassBooking;
use App\Models\KategoriClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = [
        'class_name',
        'description',
        'class_price',
        'trainer_id',
        'schedule',
        'duration_minutes',
        'capacity',
        'status',
        'id_kategori_class',
        'image'
    ];
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }

    // Relasi ke model KategoriClass
    public function kategori_class()
    {
        return $this->belongsTo(KategoriClass::class, 'id_kategori_class', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(ClassBooking::class, 'class_id', 'id');
    }
}
