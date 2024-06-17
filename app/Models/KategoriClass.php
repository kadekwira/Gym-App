<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriClass extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama_kategori",
        "image",
        "description",
        "type_image"
    ];

    public function classes()
    {
        return $this->hasMany(Kelas::class);
    }
}
