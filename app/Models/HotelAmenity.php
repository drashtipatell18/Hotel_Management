<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelAmenity extends Model
{
    use HasFactory;
    protected $table = "hotel_amenity";
    protected $fillable = [
        'name',
        'image',
        'description',
    ];
}
