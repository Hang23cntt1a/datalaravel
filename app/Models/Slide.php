<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $table = 'slides'; // Bảng trong database

    protected $fillable = ['link', 'image']; // Các trường cho phép gán hàng loạt
}
