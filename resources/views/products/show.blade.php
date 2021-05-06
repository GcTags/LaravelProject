@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
   
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if ($product->img != '')
                            <img src="{{asset('/storage/img/'.$product->img)}}" style="width:50%;">
                         @endif
                        </div>
                        <div class="col">
                            <h1> {{$product->ProductName}}</h1>
                            <p>{{$product->ProductDescription}}</p>
                            <label for="">Price: {{$product->Price}}</label><br>
                            <label for="">Stocks: {{$product->Stock}}</label><br>
                            <label for="">Status: {{$product->Status}}</label><br>
                            <i class="bi bi-cart-plus-fill"></i>
                            <a href="" class="btn btn-info">Add To Cart</a>
                            <a href="" class="btn btn-warning">Buy Now</a>
                        </div>
                        </div>
                    </div>
                  
                </div>
            </div>

    </div>
</div>
@endsection