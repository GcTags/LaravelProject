<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $user = User::find(Auth::id());
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', '=', $user->id)
            ->where('orders.deleted_at', '=', NULL)
            ->select('orders.*', 'products.img')
            ->orderBy('orders.created_at', 'desc')
            ->get();
        // dd($orders);
        // $count = $user->OrderProducts()->where('order_product_quantity','!=','')->count();

        return view('dashboards.user.orders.index', compact('orders'));
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
        $request->validate([
            'order_payment' => 'required',
        ]);
        $input = new Order();
        $input->fill($request->all());
        $input->user_id = auth()->user()->id;
        $input->status = 'Sender is preparing to ship your parcel';
        // dd($input);
        if ($input->save()) {
            $message = "Order Placed Successfully";
        }
        return redirect('/orders')->with('message', $message);
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
        $orderProduct = Order::find($id);
        // dd($orderProduct);
        if ($orderProduct->delete()) {
            $message = "Product deleted from orders";
        }
        return redirect('/orders')->with('message', $message);
    }
}
