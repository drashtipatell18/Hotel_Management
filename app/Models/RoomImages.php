<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomImages extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "rooms_images";
    protected $fillable = [
        'room_id',
        'image',
    ];
}
