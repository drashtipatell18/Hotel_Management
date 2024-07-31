<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceManger extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "price_managers";

    protected $fillable = [
        'room_type_id',
        'monday_price',
        'tuesday_price',
        'wednesday_price',
        'thursday_price',
        'friday_price',
        'saturday_price',
        'sunday_price',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }
}
