<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_products',
        'name', 
        'description', 
        'atCost',
        'salesPrice',
        'quantity' 
    ];
    
    public function getProducts(string $search = null)
    {
        $products = $this->where( function ($query) use ($search){
            if($search){
                $query->where('description', 'LIKE', "%{$search}%");
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })
        ->paginate(5);

        return $products;
   }

}