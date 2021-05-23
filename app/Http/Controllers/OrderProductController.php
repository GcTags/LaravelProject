<?php
//Cart 
namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = User::find(Auth::id());
        $orders_product = DB::table('order_products')
        ->join('products', 'order_products.product_id', '=', 'products.id')
        ->where('order_products.user_id', '=', $user->id)
        ->where('order_products.deleted_at','=', NULL)
        ->select('order_products.*', 'products.img','products.Price')
        ->orderBy('order_products.created_at','desc')
        ->get();
        
        $count = $user->OrderProducts()->where('order_product_quantity','!=','')->count();
    
        // dd($orders_product);
        return view('dashboards.user.carts.index', compact('orders_product','count'));

    }

    public function show($id)
    {
        $user = User::find(Auth::id());
        $user_id = $user->id;
        $address = $user->address;

        $OrderProduct = OrderProduct::find($id);

        $product = Product::find($OrderProduct->product_id);
        $img = $product->img;
        $productname = $product->ProductName;
        $total_price = $OrderProduct->order_product_quantity * $product->Price;
        $quantity = $OrderProduct->order_product_quantity;
        $orderProduct = OrderProduct::find($id);
        
        $orderProduct->delete();
        // dd($OrderProduct->id);
        return view('dashboards.user.orders.show', compact('total_price','quantity','address','OrderProduct', 'product'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'order_product_quantity' => 'required'
        ]);
        $input = new OrderProduct();

        $input->fill($request->all());
        $input->user_id = auth()->user()->id;
        // dd($product);
        if($input->save()){
        
            $message = "Product added to cart";
        }
        $product = new Product();
        $product = Product::find($input->product_id);
        $stock = $product->Stock;
        $quantity = ($stock) - ($input->order_product_quantity);
        $product->Stock = $quantity;
        // dd($product);
        if($product->save()){
            return redirect('/products/'.$input->product_id)->with('message', $message);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    // public function show(OrderProduct $orderProduct)
    // {
    //     //
    //     $orders_product = Product::find($order->id);
    //     return view('order.show', compact('orders_product'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderProduct = OrderProduct::find($id);
        // dd($orderProduct);
        if($orderProduct->delete()){
            $message = "Product deleted from cart";
        }
        return redirect('/carts')->with('message', $message);    
    }
}
