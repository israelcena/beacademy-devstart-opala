<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    User,
    Order,
    OrderItem,
    Product
};



class OrderController extends Controller
{

    protected $orders;
    protected $products;
    protected $users;
    protected $orderItems;

    public function __construct(Order $orderModel, Product $productModel, User $userModel, OrderItem $orderItemModel)
    {
        $this->orders = $orderModel;
        $this->products = $productModel;
        $this->users = $userModel;
        $this->orderItems = $orderItemModel;
    }
    
    public function index(Request $request)
    {
        
        return view('orders.index', compact('orders'));
    }

    public function historic(Request $request, $id)
    {
        $data = [];
        $selectUser = $this->users::findOrFail($id);
        $iduser = Auth::user()->id;

        $listOrders = $this->orders::where('user_id', $iduser)
        ->orderBy('created_at', 'desc')
        ->get();

        $data['listOrders'] = $listOrders;

        return view('orders.historic', $data, compact('selectUser'));
    }
    
    public function show(Request $request, $id)
    {
        
        $selectUser = $this->users::findOrFail($id);
        $selectOrder = $this->orders::where('user_id', $id)->get();
        $orderItems = $this->orderItems::where('order_id', $id)->get();
        $products = $this->products::all();

        
        return view('orders.show', compact('selectOrder', 'orderItems', 'products', 'selectUser'));
    }
}