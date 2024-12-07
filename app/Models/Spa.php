<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "spas";
    protected $fillable = ['name','category', 'description', 'image', 'price'];


    public function spaBookknow()
    {
        return $this->hasOne(SpaBookknow::class); // Or belongsTo, depending on your database structure
    }
}
