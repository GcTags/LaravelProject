<?php

use App\Models\Product;
use Database\Seeders\ProductSeeder;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct(User $user) 
    {
        if (FALSE) 
        {
            $this->middleware(['auth','verified']);
        }
    }
    
    public function index()
    {
        $products = DB::table('products')
        ->where('Stock','!=','0')
        ->orderBy('created_at','desc')->get();

        // dd($products);
        return view('welcome', compact('products'));
    }

    public function aboutus()
    {
        if (Auth::user()->role == 1) {

            return view('aboutus');

        } elseif (Auth::user()->role == 2) {

            return view('aboutus');

        }
    }
}
