<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        "user_id",
        "total",
        "date_time",
        "desctiption",
        "payment_method",
        "note",
        "status"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
