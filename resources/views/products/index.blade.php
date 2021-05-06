@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
        @endif
            
   


            <div class="card">
                <div class="card-body">
                    <a class="btn button btn-info" href="/products/create">Add New Product</a>
                </div>
                <div class="card-body">
                   <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                            @foreach ($products as $product)
                    <tbody> 
                        <tr>
                           
                            <td>{{$product->ProductName}}</td>
                            <td>{{$product->ProductDescription}}</td>
                            <td>{{$product->Price}}</td>
                            <td>{{$product->Stock}}</td>
                            <td>{{$product->Status}}</td>
                       
                        </tr>
                    </tbody>
                            @endforeach
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection
