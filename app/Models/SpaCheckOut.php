<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SpaCheckOut extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'spa_check_outs';
    protected $fillable = [
        'user_id',
        'spa_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'additional_info',
        'cardholder_name',
        'card_number',
        'expiry_date',
        'cvv',
        'total_price',
        'status',
    ];
}
