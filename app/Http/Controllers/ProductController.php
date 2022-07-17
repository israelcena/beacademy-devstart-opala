<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

  public function create()
  {
    return view('product.create');
  }

  public function store(Request $request)
  {
    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->value = $request->value;
    $product->photo = $request->photo;
    $product->quantity = $request->quantity;
    $product->save();

    return redirect()->route('products.create');

  }

}