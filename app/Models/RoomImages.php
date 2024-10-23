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
    public function roomimages()
{
    // Instead of belongsTo, we should access images through the room
    return $this->hasManyThrough(
        RoomImages::class,
        Room::class,
        'id', // Foreign key on rooms table
        'room_id', // Foreign key on room_images table
        'room_id', // Local key on checkouts table
        'id' // Local key on rooms table
        );
    }
}
