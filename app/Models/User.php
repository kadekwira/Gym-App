<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ClassBooking;
use App\Models\MembershipType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'membership_type_id',
        'membership_start',
        'membership_end',
        'status',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function membershipType()
    {
        return $this->belongsTo(MembershipType::class);
    }

<<<<<<< HEAD
    public function bookings()
    {
        return $this->hasMany(ClassBooking::class, 'user_id', 'id');
    }
=======
    public function isAdmin()
    {
        return $this->role === 'admin'; 
>>>>>>> 622b03a81ac4064b38c749146504a9297ed36f86
}
}