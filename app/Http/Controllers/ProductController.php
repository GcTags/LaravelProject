<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  

    public function index()
    {
        if (Auth::user()->role == 1){

            $products = DB::table('products')->get();
            return view('dashboards.admin.products.index', compact('products'));

        }elseif(Auth::user()->role == 2)
        {
            $user = User::find(Auth::id());
            $products = $user->products()->orderBy('created_at','desc')->get();
            // dd($products);
            return view('dashboards.user.products.index', compact('products'));
        }

    }
      

    public function create()
    {
        //
        return view('dashboards.user.products.create');
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
        return view('dashboards.user.products.show', compact('product'));
    }


       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('dashboards.user.products.edit', compact('product'));

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
        
        $request->validate([
            'ProductName' => 'required|unique:products|max:255',
            'ProductDescription' => 'required',
            'Price' => 'required|numeric',
            'Stock' => 'required|numeric',
            'Status' => 'required'
        ]);
        $name = $product->Productname;
        $product = Product::find($product->id);
        $product->fill($request->all());
      
        if($product->save()){
            $message =  $name.''."Successfully Updated";
        }
        return redirect('/products')->with('message', $message);
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
        $product = Product::find($product->id);
        // dd($product);
      
        if($product->delete()){
            $message = "Successfully Deleted";
        }
        return redirect('/products')->with('message', $message);
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('term');
    
        // Search in the title and body columns from the posts table
        $products = Product::query()
            ->where('ProductName', 'LIKE', "%{$search}%")
            ->orWhere('ProductDescription', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('search', compact('products'));
    }
}
