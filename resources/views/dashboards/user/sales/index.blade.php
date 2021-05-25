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
                    <div class="card-body text-center">
                        <h3>List of Sales<h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="btn button btn-info" href="/products/create">Add New Product</a>
                            </div>
                            <div class="col-md">
                                <form class="form-inline my-2 my-lg"  action="{{ route('sales.index') }}">
                                    <input class="form-control mr-sm-2" type="search" name="term"  placeholder="Search"
                                        aria-label="Search">
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
                        <table class="table caption-top">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col-12">#</th>
                                    <th scope="col-12">Image</th>
                                    <th scope="col-12">Recipient Name</th>
                                    <th scope="col-12">Recipient Address</th>
                                    <th scope="col-12">Product Name</th>
                                    <th scope="col-12">Total Quantity</th>
                                    <th scope="col-12">Total Price</th>
                                    <th scope="col-12">Mode of Payment</th>
                                    <th scope="col-12">Status</th>
                                    <th scope="col-12">Action</th>
                                </tr>
                            </thead>
                            @if ($sales->isNotEmpty())
                            @foreach ($sales as $i => $sale)
                                <tbody>
                                    <tr>
                                        <td> {{ $i + 1 }} </td>
                                        <td>
                                            @if ($sale->img != '')
                                                    <img class="rounded " src="{{ asset('/storage/img/' . $sale->img) }}"
                                                        style="width:150px; height: 150px;">
                                                @endif
                                        </td>
                                        <td>{{ $sale->name }}</td>
                                        <td>{{ $sale->order_address }}</td>
                                        <td>{{ $sale->ProductName }}</td>
                                        <td>{{ $sale->order_quantity_total }}</td>
                                        <td>{{ $sale->order_price_total }}</td>
                                        <td>{{ $sale->order_payment }}</td>
                                        <td>{{ $sale->status }}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" >
                                                    <li>
                                                        <form method="POST" action="{{ route('sales.destroy', $sale->id) }} ">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a type="submit" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"  style="width:100%;">Delete</a>       
            
                
                                                    </li>
                                                    <li><a type="button" class="btn button btn-info"
                                                          href="/sales/{{$sale->id}}/edit" style="width:100%;">Edit</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                            @else
                            <div class="card-body text-center" style="width: 1000px;">
                                <h1>No Products Found</h1>
                            </div>
                            @endif
                        </table>
                        <div class="footer text-center">
                            Total # of Products {{$count}}
                        </div>
                      
                    </div>
                </div>
            </div>
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                  Wish to delete this Product?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
                  <button type="submit" class="btn btn-danger">Yes</button>
                </div>
              </div>
            </div>
          </div>
      
        </div>

     
    @endsection
