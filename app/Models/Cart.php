<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart = null)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
		if ($this->items === null) {
			$this->items = [];
		}
        // Xác định giá sử dụng (ưu tiên promotion_price nếu có)
        $price = $item->promotion_price > 0 ? $item->promotion_price : $item->unit_price;
        
        $storedItem = [
            'qty' => 0, 
            'price' => $price, // Giá đơn vị
            'item' => $item,
            'totalPrice' => 0 // Tổng giá cho sản phẩm này
        ];

        if ($this->items && array_key_exists($id, $this->items)) {
            $storedItem = $this->items[$id];
        }

        $storedItem['qty']++;
        $storedItem['totalPrice'] = $price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        
        $this->totalQty++;
        $this->totalPrice += $price; // Cộng dồn giá đơn vị
    }

    public function reduceByOne($id)
    {
        if (!isset($this->items[$id])) {
            return;
        }

        $price = $this->items[$id]['price']; // Đã lưu giá đúng khi thêm vào

        $this->items[$id]['qty']--;
        $this->items[$id]['totalPrice'] -= $price;
        
        $this->totalQty--;
        $this->totalPrice -= $price;

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        if (!isset($this->items[$id])) {
            return;
        }

        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['totalPrice'];
        unset($this->items[$id]);
    }
    /// TÍNH IỀN
    public function updateQuantity($id, $quantity)
{
    if (!isset($this->items[$id])) {
        return;
    }

    $item = $this->items[$id];
    $unitPrice = $item['item']->promotion_price > 0 ? $item['item']->promotion_price : $item['item']->unit_price;

    // Trừ tổng cũ
    $this->totalQty -= $item['qty'];
    $this->totalPrice -= $item['totalPrice'];

    // Cập nhật lại số lượng và total của dòng sản phẩm
    $item['qty'] = $quantity;
    $item['price'] = $unitPrice; // giữ đúng ý nghĩa là giá đơn vị
    $item['totalPrice'] = $unitPrice * $quantity;

    // Gán lại vào items
    $this->items[$id] = $item;

    // Tính lại tổng
    $this->totalQty += $quantity;
    $this->totalPrice += $item['totalPrice'];
}


public function remove($id)
{
    if (isset($this->items[$id])) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
    
}