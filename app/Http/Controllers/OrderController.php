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
use App\Services\SaleService;

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
    
    public function showItems(Request $request, $id)
    {
        
        $selectUser = Auth::user();
        // dd($selectUser->getAuthIdentifier());

        $selectOrder = $this->orders::findOrFail($id);
        $iduser = Auth::user()->id;
        $idorder = $selectOrder->id;
        $listOrderItems = $this->orderItems::where('order_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $listItems = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
        ->where('order_id', $idorder)
        ->get([ 'order_items.*', 'order_items.quantity as quantityItem']);
        
        $data = [];
        $data['listItems'] = $listItems;
        
        return view('orders.show', $data, compact('selectOrder', 'selectUser'));
    }

    public function orders(Request $request)
    {
        $iduser = Auth::user()->id;

        $listOrders = $this->orders::orderBy('created_at', 'desc')->get();
  

        $listItems = OrderItem::all();
        
        $data = [];
        $data['listOrders'] = $listOrders;
        
        return view('admin.orders', $data);
    }

    public function showOrder(Request $request, $id)
    {
        
        $selectUser = Auth::user();

        $selectOrder = $this->orders::findOrFail($id);
        $iduser = Auth::user()->id;
        $idorder = $selectOrder->id;
        $listOrderItems = $this->orderItems::where('order_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $listItems = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
        ->where('order_id', $idorder)
        ->get([ 'order_items.*', 'order_items.quantity as quantityItem']);
        
        $data = [];
        $data['listItems'] = $listItems;
        
        return view('admin.orderShow', $data, compact('selectOrder', 'selectUser'));
    }

    public function create(Request $request)
    {
        $iduser = Auth::user()->id;
        $listProducts = $this->products::all();
        $data = [];
        $data['listProducts'] = $listProducts;
        return view('orders.create', $data);
    }

    public function store(Request $request)
    {
        $iduser = Auth::user()->id;
        $order = $this->orders::create([
            'user_id' => $iduser,
            'status' => 'Processando',
            'total' => 0,
        ]);
        $order->save();
        $orderId = $order->id;
        $listProducts = $this->products::all();
        foreach ($listProducts as $product) {
            $quantity = $request->input('quantity'.$product->id);
            if ($quantity > 0) {
                $orderItem = $this->orderItems::create([
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
                $orderItem->save();
            }
        }
        return redirect()->route('orders.show', $orderId);
    }

    public function edit(Request $request, $id)
    {
        $selectUser = $this->users::findOrFail($id);

        $selectOrder = $this->orders::findOrFail($id);
        // dd($selectOrder);
        $idorder = $selectOrder->id;
        $listOrderItems = $this->orderItems::where('order_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        // dd($idorder);

        $listItems = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
        ->where('order_id', $idorder)
        ->get([ 'order_items.*', 'order_items.quantity as quantityItem']);
        
        $data = [];
        $data['listItems'] = $listItems;
        
        return view('admin.orderEdit', $data, compact('selectOrder', 'selectUser', 'idorder'));
        
    }

    public function update(Request $request, $id)
    {
        $selectOrder = $this->orders::findOrFail($id);
        $iduser = Auth::user()->id;
        $idorder = $selectOrder->id;
        $listOrderItems = $this->orderItems::where('order_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $listItems = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
        ->where('order_id', $idorder)
        ->get([ 'order_items.*', 'order_items.quantity as quantityItem']);
        
        $data = [];
        $data['listItems'] = $listItems;
        
        return view('orders.edit', $data, compact('selectOrder'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        
        $cart = session()->get('cart');
        
        return view('checkout.index', compact('cart', 'user'));
    }

    public function checkoutStore(Request $request)
    {
        $products = session()->get('cart');
        $saleService = new SaleService();
        $result = $saleService->finalizeSale($products, Auth::user());
        $payment = $request->input('payment');
        // dd($payment);
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
        // $selectOrder = $this->orders::findOrFail($id);
        // $iduser = Auth::user()->id;
        // $idorder = $selectOrder->id;
        // $listOrderItems = $this->orderItems::where('order_id', $id)
        // ->orderBy('created_at', 'desc')
        // ->get();

        // $listItems = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
        // ->where('order_id', $idorder)
        // ->get([ 'order_items.*', 'order_items.quantity as quantityItem']);
        
        // $data = [];
        // $data['listItems'] = $listItems;
        
        // return view('orders.checkout', $data, compact('selectOrder'));
    // }

// }