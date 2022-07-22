<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;



class ProductController extends Controller
{

  public function __construct(Product $product)
  {
    $this->model = $product;
  }

  public function products()
  {
    $products = Product::all();
    return view ('product.products', compact('products'));
  }

  public function showProduct($id)
  {
        if(!$product = Product::find($id)){
            return redirect()->route('admin.product.products');
        }
        return view('product.showProduct', compact('product'));
    }

  public function productCreate()
  {
    return view('product.productCreate');
  }

  public function store(Request $request)
  {
    // $product = new Product;
    // $product->name = $request->name;
    // $product->description = $request->description;
    // $product->value = $request->value;
    // $product->photo = $request->photo;
    // $product->quantity = $request->quantity;
    // $product->save();

    $data = $request->all();
    
    $this->model->create($data);

    return redirect()->route('admin.product.productCreate')->with('success', 'Produto cadastrado com sucesso!');
  }

  public function edit($id)
  {

    if(!$product = $this->model->find($id)){
      return redirect()->route('admin.product.products');
    }
    return view('product.edit', compact('product'));   
  }

  public function update(Request $request, $id)
  {
    if(!$product = $this->model->find($id)){
      return redirect()->route('admin.product.products');
    }
    $data = $request->all();
    $product->update($data);
    return redirect()->route('admin.product.products');
  }
}