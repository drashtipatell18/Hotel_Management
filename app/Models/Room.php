<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['floor_id','room_number','room_type_id','ac_non_ac','food_id','bed_count','rent','phone_number','image','message','status'];


    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}


