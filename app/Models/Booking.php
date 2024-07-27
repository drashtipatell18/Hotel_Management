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
        'check_out_date',
        'email',
        'phone_number',
        'message',
    ];
    
}
