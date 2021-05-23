@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container">
               
                <div class="row">
                    <div class="col-md">

                        <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                            @csrf 
                            <div class="card py-0">                                
                                <div class="card-body">
                                    <div class="row">
    
                                        <div class="col-md">
                                            @if ($product->img != '')
                                                <img src="{{asset('/storage/img/'. $product->img)}}" style="width:70%;">
                                              @endif
                                        </div>
                                        <div class="col-md">
                                            <h2  class="mb-4">{{ $product->ProductName }}</h2>
                                            <h5>Total Quantity: <span style="font-weight: bold">{{ $quantity }}</span> </h5>
                                            <h5>Total Price:<span style="font-weight: bold"> {{ $total_price }} </span></h5>
    
                                    
                                    
                                                @if ($address != '')
    
    
                                                    <h5>Delivery Address: <span style="font-weight: bold">{{ $address }}</span></h5>
                                                    {{-- <p>Status: {{ $data->status }}</p> --}}
    
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepen">
                                                          <label class="input-group-text" for="order_payment">Mode of order_payment</label>
                                                        </div>
                                                        <select name="order_payment" class="custom-select" id="order_payment" lass="form-control @error('order_payment') is-invalid @enderror"  value="{{old('order_payment')}}"  autofocus>
                                                          {{-- <option selected>Choose...</option> --}}
                                                          <option value="COD">Cash On Delivery</option>
                                                        </select>
                                                        @error('order_payment')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        
                                                    @enderror
                                                      </div>

                                                    <input type="hidden" name="order_address" value="{{ $address}}" />
                                                    <input type="hidden" name="order_quantity_total" value="{{ $quantity}}" />
                                                    <input type="hidden" name="order_price_total" value="{{ $total_price}}"/>
                                                    <input type="hidden" name="product_id" value="{{ $product->id}}"/>

                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Place
                                                        Order</button>
                                                @endif
    
    
                                        </div>
                                        {{-- </a> --}}
                                    </div>
    
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    @endsection
