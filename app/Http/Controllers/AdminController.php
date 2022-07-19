<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\StoreUserRequest;


class AdminController extends Controller
{
    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }
    
    public function index()
    {
        return view('admin.index');
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.showUser', compact('user'));
    }
    public function update(StoreUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.users.showOne', $user->id);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Usuário excluído com sucesso!');
    }

    public function products(){

        $products = Product::all();
        return view ('admin.products', compact('products'));
    }

    public function productsShow($id)
    {
        if(!$product = Product::find($id)){
            return redirect()->route('admin.products');
        }
        return view('admin.showProduct', compact('product'));
    }

    public function productCreate()
    {
        return view('admin.productCreate');
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

    return redirect()->route('admin.productsCreate');

  }

}