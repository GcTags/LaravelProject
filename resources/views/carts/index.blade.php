@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md ">
          <div class="container">
              <div class="row"> 
                @foreach ($orders_product as $order )
                  <div class="col-md-6 col-xl-9 mb-3">
                    <a href="/products/{{$order->product_id}}" class="text-dark">
                      <div class="card py-4">    
                          {{-- <img src="{{$product->img}}" alt="" style="width: 100%;"> --}}
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h1> {{$order->order_product_quantity}}</h1><br>
                                </div>
                                <div class="col">
                                  <h1> {{$order->product_id}}</h1><br>
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
  </div>
</div>
@endsection
