@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
            @endif
        

                <div class="card">
                    <div class="card-body">
                            <div class="form-group row">
                                    <div class="col">
                                        <div class="card-body ">
                                            @if ($product->img != '')
                                            <img src="{{asset('/storage/img/'.$product->img)}}" style="width:70%;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card" >
                                            <div class="card-header">   
                                                <h2>
                                                    Php: {{$product->Price}}
                                                </h2>
                                            </div>
                                        </div><br>
                                    <div class="col">
                                        <h5 class="card-title ">  {{$product->ProductName}}</h5>
                                        <p class="card-text"> {{$product->ProductDescription}}</p>
                                        <p class="card-text">Stocks: {{$product->Stock}}</p>
                                        <p class="card-text">Status: {{$product->Status}}</p>
                                    <form method="POST" action="{{ route('carts.store') }}" enctype="multipart/form-data">
                                            @csrf 
                                        <div class="form-group row">
                                            <label for="order_product_quantity" class="col-md-3 col-form-label text-md-left">{{ __('Quantity')}}</label>
                                            
                                                <div class="col-2">
                                                    <input type="number" name="order_product_quantity" id="order_product_quantity" class="form-control @error('order_product_quantity') is-invalid @enderror"  value="{{old('order_product_quantity')}}"  autofocus>
                        
                                                    @error('order_product_quantity')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $product->id}}"/>
                                            </div>
                                        @auth
                                        <div class="form-group row-md-2">
                                            <input  type="submit" class="btn btn-info" value="Add To Cart"> 
                                            <a href="/carts/{{ $product->id }}" class="text-dark">
                                            <input class="btn btn-warning" value="Buy">
                                            </a>
                                        </div>
                                        @endauth
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection