<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HallType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "halltypes";
    protected $fillable = [
        'halltype_name',
        'halltype_image',
        'halltype_capacity',
        'base_price',
        'description',
        'status',
    ];
}
