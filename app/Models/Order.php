<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id'; // <- đã đúng với DB
    public $timestamps = false;

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'status',
        'total',
        'ship',
        'usermane', // Gợi ý: sửa thành 'username' nếu đúng là vậy
        'email',
        'phone',
        'address',
        'note',
        'payment',
        'IDuser'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'IDuser', 'id');
    }

// app/Models/Order.php

public function billDetails()
{
    return $this->hasMany(BillDetail::class, 'order_id', 'id');
}

public function details()
{
    return $this->hasMany(BillDetail::class, 'order_id');
}



}
