<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPrefrence extends Model
{
    use HasFactory;
    protected $table = "additional_prefrence";
    protected $fillable = [
        'name',
        'image'
    ];
}
