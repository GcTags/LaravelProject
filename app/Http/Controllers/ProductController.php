<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $products = DB::table('products')->get();
        // dd($products);
        
        return view('products.index', compact('products'));

    }

    public function create()
    {
        //
        return view('products.create');
    }

    public function store(Request $request)
    {
   
        $request->validate([
            'ProductName' => 'required|unique:products|max:255',
            'ProductDescription' => 'required',
            'Price' => 'required|numeric',
            'Stock' => 'required|numeric',
            'Status' => 'required'
        ]);

        if($request->hasFile('img')){

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/img', $filenameToStore);
        
        }else{
            $filenameToStore = '';
        }
        //
        $product = new Product();
        $product->fill($request->all());
        // $post->title = $request->title;
        // $post->description = $request->description;
        $product->img = $filenameToStore;
        $product->user_id = auth()->user()->id;
        if($product->save()){
            $message = "Successfully save";
        }
        return redirect('/products')->with('message', $message);
    }


    public function show(Product $product)
    {
        $product = Product::find($product->id);
        // dd($products);
        return view('products.show', compact('product'));
    }


       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
