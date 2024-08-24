<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'event_image',
        'event_name',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'total_hours',
        'description',
        'status',
    ];
}
