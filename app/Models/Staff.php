<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'hotel_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'country',
        'state',
        'city',
        'phone',
        'position_id',
        'salary',
        'birth_date',
        'hire_date',
        'gender',
        'aadharcard',
        'address',
        'profile_pic',
        'status'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
