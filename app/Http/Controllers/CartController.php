<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Services\SaleService;
use Illuminate\Support\Facades\Auth;



use function GuzzleHttp\Promise\all;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $user = Auth::user();
        // dd($user->id);
        
        $cart = session()->get('cart');
        // $total = $this->total($cart);
        // if($cart){
        //     $total = 0;
        //     foreach ($cart as $item) {
        //     $total += $item['price'] * $item['quantity'];
        // }
        // }
        
        
        return view('cart.index', compact('cart', 'user'));
    }

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

    public function update($id, Request $request)
    {
        $request = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function total($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        $total = $this->total($cart);
        return view('cart.checkout', compact('cart', 'total'));
    }

    public function finalize(Request $request)
    {
        $products = session()->get('cart');
        $saleService = new SaleService();
        $result = $saleService->finalizeSale($products, Auth::user());
        // dd($result);

        if ($result['status'] == 'success') {
            session()->forget('cart');
            return redirect()->route('cart.index')->with('success', $result['message']);
        } else {
            return redirect()->route('cart.index')->with('error', $result['message']);
        }

        return redirect()->route('cart.index')->with('success', 'Compra realizada com sucesso!');
    }

}