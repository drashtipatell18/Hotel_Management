<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "users_address";
    protected $fillable = [
        'id',
        'user_id',
        'address',
        'country',
        'state',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Adjust 'user_id' and 'id' if needed
    }
}
