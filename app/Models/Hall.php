<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hall extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "hall";
    protected $fillable = [
        'floor_id',
        'halltype_id',
        'hall_number',
        'description',
        'status',
    ];
    public function halltype()
    {
        return $this->belongsTo(HallType::class);
    }
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
