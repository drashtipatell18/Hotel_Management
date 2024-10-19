<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['floor_id','room_name','room_number','room_type_id','ac_non_ac','food_id','bed_type','rent','phone_number','room_size','message','status','from_date','to_date','total_member_capacity','smoking_id','view_id'];


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
    public function images()
    {
        return $this->hasMany(RoomImages::class, 'room_id', 'id');
    }
    public function offer() {
        return $this->belongsTo(OfferPackage::class); // Adjust this as per your database structure
    }
}


