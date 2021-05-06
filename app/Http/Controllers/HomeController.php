<?php

use App\Models\Product;
use Database\Seeders\ProductSeeder;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index()

    {
        $products = DB::table('products')->get();
        // dd($products);
        return view('welcome', compact('products'));

    }
}
