<?php

namespace App\Http\Controllers;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboards.user.orders.index');

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
        dd("Hello World");
        // return redirect('/orders')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        // $order = Product::find($order->id);
        // dd($products);
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $data = OrderProduct::find($id);
        // dd($data);

        $user = User::find(Auth::id());
        // dd($user);
        $user_id = $user->id;
        $address = $user->address;
        

        $product = Product::find($data->product_id);
        // dd($product->Price);

        $total_price = $data->order_product_quantity * $product->Price;
        // dd($total_price); 
        $img = $product->img;
        $quantity = $data->order_product_quantity;

        $input = new Order();
        $input->user_id = $user_id;
        $input->product_id = $product->id;
        $input->order_quantity_total = $data->order_product_quantity;
        $input->order_price_total = $total_price;
        $input->status = 'not delivered';
        if($input->save()){

            $data = Order::find(1);
            return view('dashboards.user.orders.index', compact('total_price','quantity','img','address','data'));
        }
        // return redirect('/orders')->compact('total_price', $total_price);
       dd("Error");

    }
}

