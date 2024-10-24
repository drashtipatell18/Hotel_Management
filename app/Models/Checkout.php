<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\RoomImages;
use App\Models\Booking;
class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'booking_id',
        'room_id',
        'first_name',
        'last_name',
        'email',
        'dob',
        'phone',
        'house_no',
        'buling_name',
        'country',
        'state',
        'city',
        'message',
        'cardholder_name',
        'card_number',
        'expiry_date',
        'cvv',
        'total_price',
        'captcha',
        'status',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class); // Assuming 'room_id' is the foreign key in checkout table
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function roomimages()
    {
        return $this->belongsTo(RoomImages::class); // Assuming RoomImage is the related model
    }
}
