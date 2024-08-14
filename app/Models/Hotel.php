<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "hotel";
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'stars',
        'status'
    ];
    public function staff()
    {
        return $this->hasMany(Staff::class, 'hotel_id');
    }
    public function images()
    {
        return $this->hasMany(HotelImages::class, 'hotel_id', 'id');
    }
}
