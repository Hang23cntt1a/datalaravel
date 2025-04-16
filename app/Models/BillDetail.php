<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
    public $timestamps = false; // Nếu bảng không có cột created_at và updated_at

    protected $fillable = [
        'id_bill',
        'product_id',
        'quantity',
        'unit_price'
    ];


    public function bill()
    {
        return $this->belongsTo(Bill::class, 'id_bill');
    }

    public function product()
{
    return $this->belongsTo(Product::class, 'id_product');
}


    // app/Models/BillDetail.php
public function order()
{
    return $this->belongsTo(Order::class);
}



}
