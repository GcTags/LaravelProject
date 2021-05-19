@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  
                  <div class="container">
                    <div class="row">
                        <div class="col">
                     
                                        <div class="card py-0"> 
                                                <div class="card-body">
                                                <div class="row">
                                                
                                                    <div class="col-md">
                                                    @if ($img != '')
                                                    <img src="{{$img}}" style="width:400px;">
                                                    @endif
                                                    </div>                                
                                                    <div class="col-md">
                                                    
                                                    <p>Quantity: {{$quantity}}</p>
                                                    <p>Total Price: {{$total_price}}</p>

                                                    </div>
                                
                                                </div> 
                                            {{-- </a> --}}
                                            </div>
                        
                        </div>
                        <div class="col">
                                        <div class="card py-0"> 
                                                <div class="card-body">
                                                <div class="row">
                                                
                                                    <div class="col-md">
                                                    @if ($address != '')
                                                    
                                                    
                                                    <p>ADDRESS: {{$address}}</p>
                                                    <p>Status:       {{ $data->status }}</p>

                                                    <button type="button" class="btn btn-primary btn-lg btn-block">Place Order</button>
                                                    @endif
                                                    </div>                                
                                                    
                                
                                                </div> 
                                            {{-- </a> --}}
                                            </div>
                
    </div>
  </div>
</div>
                
      </div>
  </div>
</div>
       
@endsection
