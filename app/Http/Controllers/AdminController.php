<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
        
        $new_user = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $new_user[$month-1] = $users[$index];
        }
        $ord_user = OrderProduct::select(DB::raw("user_id ,COUNT(*)"))
                    ->groupBy(DB::raw("user_id"))
                    ->pluck('user_id');
        
        $pro_user = Product::select(DB::raw("user_id ,COUNT(*)"))
                    ->groupBy(DB::raw("user_id"))
                    ->pluck('user_id');

        $act_user = User::select(DB::raw("id"))
                    ->whereNotNull('email_verified_at')
                    ->pluck('id');
                
        // dd($no_user);
        // echo count($no_user);

        return view('dashboards.admin.index', compact('new_user','ord_user','pro_user','act_user'));  
    }
}
