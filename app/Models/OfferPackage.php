<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OfferPackage extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'offer_packages';
    protected $fillable = [
        'hotel_id',
        'title',
        'offer_include',
        'description',
        'image',
        'discount_type',
        'discount_value',
        'start_date',
        'end_date',
        'is_active',
    ];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'offer_id');
    }
}
