<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\StoreUpdateProductsFormRequest;
//use App\Http\Requests\StoreProductsFormRequest;
use Validator;


class ProductController extends Controller
{
  public function __construct(Product $product)
  {
    $this->model = $product;
  }

  public function products()
  {
    $products = Product::paginate(5);
    return view('product.products', compact('products'));
  }

  public function showProduct($id)
  {
    if (!$product = Product::find($id)) {
      return redirect()->route('admin.product.products');
    }
    return view('product.showProduct', compact('product'));
  }

  public function productCreate()
  {
    return view('product.productCreate');
  }

  public function store(StoreUpdateProductsFormRequest $request)
  {

    $data = $request->all();

    $file = $request['image_products'];
    $path = $file->store('itens', 'public');
    $data['image_products'] = $path;

    $this->model->create($data);

    return redirect()->route('admin.product.productCreate')->with('success', 'Produto cadastrado com sucesso!');
  }

  public function destroy($id)
  {

    if (!$product = Product::find($id)) {
      return redirect()->route('admin.product.products');
    }
    $product->delete();

    return redirect()->route('admin.product.products');
  }

  public function edit($id)
  {
    if (!$product = $this->model->find($id)) {
      return redirect()->route('admin.product.products');
    }
    return view('product.edit', compact('product'));
  }

  public function update(StoreUpdateProductsFormRequest $request, $id)
  {
    if (!$product = $this->model->find($id)) {
      return redirect()->route('admin.product.products');
    }

    $data = $request->all();

    if ($request->hasFile('image_products')) {
      $data['image_products'] = $request->file('image_products')->store('itens', 'public');
    }

    $product->update($data);
    return redirect()->route('admin.product.products')->with('success', 'Produto atualizado com sucesso!');
  }
}