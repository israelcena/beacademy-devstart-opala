<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function total()
    {
        return $this->quantity * $this->subtotal;
    }

    public function price()
    {
        return $this->product->salesPrice;
    }

    public function quantity()
    {
        return $this->quantity;
    }

    public function subtotal()
    {
        return $this->subtotal;
    }

    
}