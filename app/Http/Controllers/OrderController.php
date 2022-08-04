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
use Exception;
use FFI\Exception as FFIException;
use PagSeguro\Configuration\Configure;
use PagSeguro\Library;
use PagSeguro\Domains\Requests\Payment;
use PagSeguro\Domains\Requests\PreApproval;
use PagSeguro\Domains\Requests\Sender;
use PagSeguro\Domains\Requests\Shipping;
use PagSeguro\Domains\Requests\Item;
use PagSeguro\Domains\Requests\DirectPayment\CreditCard;
use PagSeguro\Domains\Requests\DirectPayment\Boleto;
use PagSeguro\Domains\Requests\DirectPayment\OnlineDebit;






class OrderController extends Controller
{
    
    protected $orders;
    protected $products;
    protected $users;
    protected $orderItems;
    private $_configs;

    
    
    public function __construct(Order $orderModel, Product $productModel, User $userModel, OrderItem $orderItemModel)
    {
        $this->orders = $orderModel;
        $this->products = $productModel;
        $this->users = $userModel;
        $this->orderItems = $orderItemModel;
        $this->_configs = new Configure();
        $this->_configs->setCharset('UTF-8');
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment('sandbox');
        // $this->_configs->setLog(true, storage_path('logs/pagseguro_' . date('Y-m-d') . '.log'));

        Library::initialize($this->_configs);
        
        // try {
        //     Library::initialize();
        //     Library::cmsVersion()->setName("My project")->setRelease("0.0.1");
        //     Library::moduleVersion()->setName("My project")->setRelease("0.0.1");
        // } catch (Exception $e) {
        //     die($e);
        // }
        
    }

    public function getCredential()
    {
        return $this->_configs->getAccountCredentials();
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
        $selectUser = Auth::user();

        $selectOrder = $this->orders::findOrFail($id);
        $idorder = $selectOrder->id;
        $listOrderItems = $this->orderItems::where('order_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $listItems = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
        ->where('order_id', $idorder)
        ->get([ 'order_items.*', 'order_items.quantity as quantityItem']);
        
        $data = [];
        $data['listItems'] = $listItems;
        
        return view('admin.orderEdit', $data, compact('selectOrder', 'selectUser', 'idorder'));
        
    }

    public function update(Request $request, $id)
    {
        $selectUser = Auth::user();
        $order = $this->orders::findOrFail($id);
        $selectOrder = $this->orders::findOrFail($id)->update([
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'total' => $request->input('total'),
        ]);

         $orderItems = $this->orderItems::where('order_id', $id)->get();
         $orderItems->each(function($orderItem) use ($request) {
            $orderItem->update([
                'quantity' => $request->input('quantity'.$orderItem->id),
                'price' => $request->input('price'.$orderItem->id),
                'subtotal' => $request->input('subtotal'.$orderItem->id),
            ]);
        });
    
        
        return redirect()->route('admin.orders')->with('success', 'Pedido atualizado com sucesso!');
    }



    public function checkout(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        
        $cart = session()->get('cart');
        
        return view('checkout.index', compact('cart', 'user'));
    }

    public function payment(Request $request)
    {
       $data = [];
       $user = User::findOrFail(Auth::user()->id);
        $data['user'] = $user;
        $cart = session()->get('cart');
        $data['cart'] = $cart;

       $sessionCode = \PagSeguro\Services\Session::create(
            $this->getCredential()
        );

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $data['total'] = $total;

        $IDSession = $sessionCode->getResult();
        $data["sessionID"] = $IDSession;
        // $data['sessionCode'] = $sessionCode->getResult();
        // $cart = session()->get('cart');
        // $data['cart'] = $cart;
        // $data['total'] = $cart->total();
        // $data['user'] = Auth::user();
        


        return view('checkout.payment', $data);

       
    }

    public function checkoutStore(Request $request)
    {
        $products = session()->get('cart');
        $saleService = new SaleService();
        $result = $saleService->finalizeSale($products, Auth::user());
    
    //    dd($result);
        if ($result['status'] == 'success') {
            session()->forget('cart');

            $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
            $creditCard->setReference("PED_".$result['orderid']);
            $creditCard->setCurrency("BRL");

            foreach ($products as $product) {
                $creditCard->addItems()->withParameters(
                    $product['id'],
                    $product['name'],
                    $product['quantity'],
                    $product['price'],
                );
            }

            $user = User::findOrFail(Auth::user()->id);

            $creditCard->setSender()->setName($user->name);
            $creditCard->setSender()->setEmail($user->email);
            $creditCard->setSender()->setDocument()->withParameters(
                'CPF',
                $user->cpf
            );
            $creditCard->setSender()->setHash($request->input('hashseller'));
            $creditCard->setSender()->setPhone()->withParameters(
                71,
                999999999
            );

            $creditCard->setShipping()->setAddress()->withParameters(
                'Rua Amazônia',
                '15',
                'Centro',
                '22222222',
                'Salvador',
                'BA',
                'BRA',
                'Casa',
            );

            $creditCard->setBilling()->setAddress()->withParameters(
                'Rua Amazônia',
                '15',
                'Centro',
                '22222222',
                'Salvador',
                'BA',
                'BRA',
                'Casa',                          
            );

            $creditCard->setToken("9ac8929d9df344f3a3367e87b10f5d19");

            $nparcela = $request->input('nparcela');
            $totalapagar = $request->input('totalapagar');
            $totalparcela = $request->input('totalparcela');

            $creditCard->setInstallment()->withParameters($nparcela, number_format($totalparcela, 2, '.', ''));

            $creditCard->setHolder()->setName($user->name);
            $creditCard->setHolder()->setBirthDate("18/01/1990");
            $creditCard->setHolder()->setDocument()->withParameters(
                'CPF',
                $user->cpf
            );
            $creditCard->setHolder()->setPhone()->withParameters(
                71,
                999999999
            );

            $creditCard->setMode('DEFAULT');
            $result = $creditCard->register($this->getCredential());
        
            
            // return redirect()->route('cart.index')->with('success', 'Compra realizada com sucesso!');
        } else {
            echo "Erro ao realizar a compra";
            return redirect()->route('cart.index')->with('error', $result['message']);
        }

        return redirect()->route('cart.index')->with('success', 'Compra realizada com sucesso!');
    }
}