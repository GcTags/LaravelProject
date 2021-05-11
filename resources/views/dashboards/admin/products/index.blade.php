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
                            <div class="col-12">
                                <a class="btn button btn-info" href="/products/create">Add New Product</a>
                            </div>
                            <div class="col-12">
                                <form class="form-inline my-2 my-lg">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </div>

                    </div>


                    <div class="card-body">
                        <caption>List of Products</caption>
                        <table class="table caption-top">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col-12">Product Name</th>
                                    <th scope="col-12">Product Description</th>
                                    <th scope="col-12">Price</th>
                                    <th scope="col-12">Stock</th>
                                    <th scope="col-12">Status</th>
                                    <th scope="col-12">Action</th>
                                </tr>
                            </thead>
                            @foreach ($products as $product)
                                <tbody>
                                    <tr>

                                        <td>{{ $product->ProductName }}</td>
                                        <td>{{ $product->ProductDescription }}</td>
                                        <td>{{ $product->Price }}</td>
                                        <td>{{ $product->Stock }}</td>
                                        <td>{{ $product->Status }}</td>
                                        <td>
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
                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                    <button class="dropdown-item text-success" type="button">Edit</button>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
