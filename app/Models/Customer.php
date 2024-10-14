<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'bkg_customer_id',
        'name',
        'lname',
        'country',
        'state',
        'city',
        'room_type',
        'total_numbers',
        'date',
        'time',
        'depature_date',
        'email',
        'ph_number',
        'fileupload',
        'address',
        'gender',
        'aadharcard',
        'status',
        'user_id'
    ];
}
