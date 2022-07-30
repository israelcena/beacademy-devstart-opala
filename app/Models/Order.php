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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function total()
    {
        return $this->orderItems->sum('price');
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