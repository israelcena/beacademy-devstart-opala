<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_products' => 'mimes:jpeg, jpg, png, bmp, gif, svg', 
        'name', 
        'description', 
        'atCost',
        'salesPrice',
        'quantity', 
    ];

    
}