<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'booking_id',
        'first_name',
        'last_name',
        'email',
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
        'status',
    ];
}
