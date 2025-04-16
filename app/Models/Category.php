<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $table = 'type_products';
protected $fillable = ['name', 'description', 'image'];

public function products(){
    return $this->hasMany(Product::class, 'id_type', 'id');
}




}
