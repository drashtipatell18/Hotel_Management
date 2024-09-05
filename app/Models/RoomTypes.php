<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_name',
        'description',
        'capacity',
        'extra_bed',
        'per_extra_bed_price',
        'extra_bed_price',
        'extra_bed_quantity',
        'amenities_id',
        'base_price',
        'extra_bed_price',
        'room_image',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(RoomTypeImage::class, 'roomType_id', 'id');
    }


}
