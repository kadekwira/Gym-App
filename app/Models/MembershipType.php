<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembershipType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'duration_member',
        'price_member',
        'title',
        'by',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
