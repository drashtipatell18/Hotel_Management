<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "booking";
    protected $fillable = [
        'customer_id',
        'room_type_id',
        'room_number',
        'floor_id',
        'ac_non_ac',
        'bed_count',
        'rent',
        'total_numbers',
        'booking_date',
        'time',
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
        'total_hours',
        'email',
        'phone_number',
        'message',
        'status'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class);
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
