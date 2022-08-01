<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    protected $product;
    
    public function index()
    {

        $products = Product::all();

        return view('home.index', compact('products'));
    }
}