<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Đảm bảo đúng tên bảng trong database
    protected $fillable = ['name', 'price', 'description', 'new', 'top'];

}
