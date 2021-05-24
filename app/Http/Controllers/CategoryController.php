<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laptop()
    {
        $products = DB::table('products')
        ->where('Category', '=', 'Laptops')
        ->orderBy('created_at', 'desc')->get();

        return view('search', compact('products'));

    }

    public function desktop()
    {
        $products = DB::table('products')
        ->where('Category', '=', 'Desktops')
        ->orderBy('created_at', 'desc')->get();

        return view('search', compact('products'));

        
    }
    public function component()
    {
        
        $products = DB::table('products')
        ->where('Category', '=', 'Components')
        ->orderBy('created_at', 'desc')->get();

        return view('search', compact('products'));

 
    }
}
