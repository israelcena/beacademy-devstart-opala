<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

use function GuzzleHttp\Promise\all;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        
        $cart = session()->get('cart');
        // $total = $this->total($cart);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        
        return view('cart.index', compact('cart', 'total'));
    }

    // public function add($id = 0, Request $request)
    // {
    //     $product = Product::find($id);
    //     $cart = session()->get('cart');
    //     $cart[$id] = [
    //         'id' => $product->id,
    //         'name' => $product->name,
    //         'price' => $product->salesPrice,
    //         'photo' => $product->image_products,
    //         'quantity' => 1
    //     ];
    //     session()->put('cart', $cart);
    //     return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho com sucesso!');
    // }

    public function add($id = 0, Request $request)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [];
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'quantity' => 1,
                'price' => $product->salesPrice,
                'name' => $product->name,
                'photo' => $product->image_products,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }

    public function remove($id, Request $request)

    {
        $request = Product::find($id);
        $cart = session()->get('cart');
        
        if (isset($cart[$id])) 
            unset($cart[$id]);

        session()->put('cart', $cart);
        
        return redirect()->route('cart.index')->with('warning', 'Produto removido do carrinho com sucesso!');
    }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    // public function index()
    // {
    //     $cart = session()->get('cart');
    //     if (!$cart) {
    //         $cart = [];
    //     }
    //     return view('cart.index', compact('cart'));
    // }
    
    // public function add($id)
    // {
    //     $product = Product::find($id);
    //     $cart = session()->get('cart');
    //     if (!$cart) {
    //         $cart = [];
    //     }
    //     if (array_key_exists($id, $cart)) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             'name' => $product->name,
    //             'price' => $product->salesPrice,
    //             'photo' => $product->image_products,
    //             'quantity' => 1
    //         ];
    //     }
    //     session()->put('cart', $cart);
    //     return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho com sucesso!');
    // }

    // public function remove($id)
    // {
    //     $cart = session()->get('cart');
    //     if (array_key_exists($id, $cart)) {
    //         unset($cart[$id]);
    //     }
    //     session()->put('cart', $cart);
    //     return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho com sucesso!');
    // }
}