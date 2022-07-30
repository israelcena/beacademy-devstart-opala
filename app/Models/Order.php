<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'payment',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function total($cart)
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function status()
    {
        $descricao = '';

        switch ($this->status) {
            case '1':
                $descricao = 'Pendente';
                break;
            case '2':
                $descricao = 'Aprovado';
                break;
            case '3':
                $descricao = 'Recusado';
                break;
    }
        return $descricao;
    }

    
}