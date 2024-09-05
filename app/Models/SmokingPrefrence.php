<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmokingPrefrence extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "smoking_prefrence";
    protected $fillable = [
        'name',
        'image'
    ];
        
}
