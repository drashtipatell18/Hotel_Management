<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomTypeImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'roomType_id',
        'room_image',
    ];
}
