<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{

    public function index(Request $request){

       if (Auth::user()->role == 2){

            $user = User::find(Auth::id());
            $count = $user->products()->where('ProductName','!=','')->count();

        //     if($request){
        //         $sales = $user->products()
        //         ->where([['ProductName','!=',Null],
        //             [function($query) use ($request) {
        //                 if (($term = $request->term)) {
        //                     $query->orWhere('ProductName','LIKE', '%' . $term . '%')->get();
        //                 }
        //             }]
        //         ])
        //             ->withTrashed()
        //             ->orderBy("id")
        //             ->paginate(10);
                
        //             return view('dashboards.user.sales.index', compact('sales','count'))
        //             ->with('i', (request()->input('page', 1) -1) * 5);
                // }else{
                    $sales = $user->products()
                    ->join('orders', 'products.id', '=', 'orders.product_id')
                    ->join('users', 'orders.user_id', '=','users.id')
                    ->where('products.user_id', '=', $user->id)
                    ->where('orders.deleted_at','=', NULL)
                    ->select('orders.*', 'products.img','products.ProductName','products.Price','users.name')
                    ->orderBy('orders.created_at','desc')
                    ->get();
                    // dd($sales);

                    return view('dashboards.user.sales.index', compact('sales','count'));
                // }
                
            }
        }
        public function edit(Order $order)
        {   
            $user = User::find(Auth::id());
            $order = $user->orders($order)
            // ->join('products','orders.product_id','=','products.id')
            // ->join('users', 'orders.user_id', '=','users.id')
            // ->where('products.user_id', '=', $user->id)
            // ->where('orders.deleted_at','=', NULL)
            // ->select('orders.*', 'products.img','products.ProductName','products.Price','users.name')
            // ->orderBy('orders.created_at','desc')
            ->get();
            // dd($order);
            if (Auth::user()->role == 1){
                return view('dashboards.admin.sales.edit', compact('order'));
    
            }elseif(Auth::user()->role == 2){
                return view('dashboards.user.sales.edit', compact('order'));
    
            }
    
        }

}
