@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

          <div class="col-md col-xl-10 mb-3">
            @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message')}}
            </div>
          @endif
        </div>
              
    
                @foreach ($orders_product as $orderProduct )
                  <div class="col-md col-xl-10 mb-3">
                    <a href="/products/{{$orderProduct->product_id}}" class="text-dark">
                      <div class="card py-0">    
                            <div class="card-body">
                              <div class="row">
                             
                                <div class="col-md">
                                  @if ($orderProduct->img != '')
                                  <img src="{{asset('/storage/img/'.$orderProduct->img)}}" style="width:40%;">
                                  @endif
                                </div>                                
                                <div class="col-md">
                                  <p>Price: {{$orderProduct->Price}} </p>
                                  <p>Quantity: {{$orderProduct->order_product_quantity}}</p>
                                  <p>Total Number: {{$count}}</p>

                                </div>
                                <div class="row">
                                    <div class="col">
                                  <form method="POST" action="{{route('carts.destroy', $orderProduct->id)}} ">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>       
                                </div>
                                <div class="col-md">
                                  <form method="POST" action="{{route('carts.destroy', $orderProduct->id)}} ">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success">Checkout</button>       
                                  </div>
                                </div>
                              </div>            
                            </div> 
                        </div>
                      </a> 
                  </div>
                @endforeach
      </div>
  </div>
</div>

@endsection
