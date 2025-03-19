<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'model', 'produced_on', 'mf_id', 'image'];

    public function carlists(): HasMany
    {
        return $this->hasMany(Car::class, 'mf_id', 'id');
    }

    public function mfs()
    {
        return $this->belongsTo(Mf::class, 'mf_id', 'id');
    }

}

