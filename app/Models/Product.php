<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Đảm bảo đúng tên bảng trong database
    protected $fillable = [
        'name',
        'description',
        'unit_price',
        'promotion_price',
        'unit',
        'id_type',
        'image',
        'top',
        'new',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class, 'id_type', 'id');
    }



}
