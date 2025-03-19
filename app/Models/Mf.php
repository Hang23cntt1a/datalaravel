<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mf extends Model
{
    use HasFactory;
    protected $table = 'mfs';
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany(Car::class, 'mf_id', 'id');
    }
}


