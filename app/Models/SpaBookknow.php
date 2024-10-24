<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Spa;

class SpaBookknow extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "spa_bookknows";
    protected $fillable = ['spa_id', 'time', 'checkin', 'technician', 'person', 'price', 'total_price'];

    public function spa()
    {
        return $this->belongsTo(Spa::class, 'spa_id');
    }
}

