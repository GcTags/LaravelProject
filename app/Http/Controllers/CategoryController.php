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
        if (Auth::user()->role == 1) {

            $products = DB::table('products')
                ->where('Category', '=', 'Laptops')
                ->orderBy('created_at', 'desc')->get();

            // dd($products);
            return view('search', compact('products'));
        } elseif (Auth::user()->role == 2) {

            $user = User::find(Auth::id());
            // $count = $user->products()->where('ProductName','!=','')->count();

            $products = DB::table('products')
                ->where('Category', '=', 'Laptops')
                ->orderBy('created_at', 'desc')->get();

            // dd($products);
            return view('search', compact('products'));
        }
    }

    public function desktop()
    {
        if (Auth::user()->role == 1) {

            $products = DB::table('products')
                ->where('Category', '=', 'Desktops')
                ->orderBy('created_at', 'desc')->get();

            // dd($products);
            return view('search', compact('products'));
        } elseif (Auth::user()->role == 2) {

            $user = User::find(Auth::id());
            // $count = $user->products()->where('ProductName','!=','')->count();

            $products = DB::table('products')
                ->where('Category', '=', 'Desktops')
                ->orderBy('created_at', 'desc')->get();

            // dd($products);
            return view('search', compact('products'));
        }
    }
    public function component()
    {
        if (Auth::user()->role == 1) {

            $products = DB::table('products')
                ->where('Category', '=', 'Components')
                ->orderBy('created_at', 'desc')->get();

            // dd($products);
            return view('search', compact('products'));
        } elseif (Auth::user()->role == 2) {

            $user = User::find(Auth::id());
            // $count = $user->products()->where('ProductName','!=','')->count();

            $products = DB::table('products')
                ->where('Category', '=', 'Components')
                ->orderBy('created_at', 'desc')->get();

            // dd($products);
            return view('search', compact('products'));
        }
    }
}
