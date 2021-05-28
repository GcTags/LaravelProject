@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12-md-8">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif




                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="btn button btn-info" href="/products/create">Add New Product</a>
                            </div>
                            <div class="col-md">
                                <form class="form-inline my-2 my-lg" method="GET"
                                    action="{{ route('products.index') }}" role="search">
                                    <input 
                                        class="form-control mr-sm-2" 
                                        type="text" 
                                        placeholder="Search"
                                        aria-label="Search"
                                        name="term"
                                        id="term">
                                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                                    <a style="margin-left:10px;" href="{{ route('products.index') }}" class=" mt-1">
                                            <!-- <i class="fa fa-refresh">I cant put icon for refresh</i> -->
                                            <!-- <i class="bi bi-arrow-counterclockwise"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                            </svg>
                                            <!-- <i class="icon-refresh">Refresh</i> 
                                            <i class="fas fa-redo-alt"></i> -->
                                    </a>
                                </form>
                            </div>
                        </div>

                    </div>


                    <div class="card-body">
                        <caption>List of Products</caption>
                        <table class="table caption-top">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col-12">#</th>
                                    <th scope="col-12">Image</th>
                                    <th scope="col-12">Product Name</th>
                                    <th scope="col-12">Product Description</th>
                                    <th scope="col-12">Price</th>
                                    <th scope="col-12">Stock</th>
                                    <th scope="col-12">Status</th>
                                    <th scope="col-12">Availability</th>
                                    <th scope="col-12">Action</th>
                                </tr>
                            </thead>
                            @foreach ($products as $i => $product)
                                <tbody>
                                    <tr>
                                        <td> {{ $i + 1 }} </td>
                                        <td>
                                            @if ($product->img != '')
                                                    <img class="rounded " src="{{ asset('/storage/img/' . $product->img) }}"
                                                        style="width:150px; height: 150px;">
                                                @endif
                                        </td>
                                        <td>{{ $product->ProductName }}</td>
                                        <td>{{ $product->ProductDescription }}</td>
                                        <td>{{ $product->Price }}</td>
                                        <td>{{ $product->Stock }}</td>
                                        <td>{{ $product->Status }}</td>
                                        @if ($product->deleted_at === NULL)
                                        <td>Available</td>
                                        @else
                                        <td>Removed</td>
                                        @endif
                                        <td style="text-align:center;">
                                        @if ($product->deleted_at === NULL)
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                        
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <form method="POST"
                                                        action="{{ route('products.destroy', $product->id) }} ">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('products.edit', $product->id) }}" class="dropdown-item text-primary" type="submit">Edit</a>
                                                </div>
                                            </div>
                                        @endif</td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
