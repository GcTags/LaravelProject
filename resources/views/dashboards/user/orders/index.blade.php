@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
        <div class="col-md col-xl-10 mb-3">
        <div class="card">
          <div class="card-body text-center">
              <h5>Placed Orders</h5>
          </div>
      </div>
    </div>
          <div class="col-md col-xl-10 mb-3">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
          @endif
        </div>
              
        @if ($orders->isNotEmpty())

                @foreach ($orders as $order)

                  <div class="col-md col-xl-10 mb-3">
                      <div class="card py-0">    
                        {{-- <a href="/products/{{$order->product_id}}" disabled> --}}
                            <div class="card-body">
                              <div class="row">
                             
                                <div class="col-md">
                                  @if ($order->img != '')
                                  <img src="{{asset('/storage/img/'.$order->img)}}" style="width:50%;">
                                  @endif
                                </div>                                
                                <div class="col-md">
                                  <p>Total Price: <span style="font-weight: bold">{{$order->order_price_total}}</span> </p>
                                  <p>Total Quantity: <span style="font-weight: bold">{{$order->order_quantity_total}}</span></p>
                                  <p>Delivery Address: <span style="font-weight: bold">{{$order->order_address}}</span></p>

                                  <p>Delivery Status: <span style="font-weight: bold">{{$order->status}}</span></p>

                                  {{-- <p>Total Number: {{$count}}</p> --}}

                                </div>
                                <div class="row">
                                    <div class="col">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Delete</button>       
                                   
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body text-center">
                                            Wish to Cancel this Product?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                                            <form method="POST" action="{{route('orders.destroy', $order->id)}} ">
                                              @method('DELETE')
                                              @csrf
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                             
                             
                                  </div>
                                </div>
                              </div>            
                            </div> 
                          {{-- </a> --}}
                        </div>
                  </div>
             @endforeach
             @else
             <div class="col-md col-xl-10 mb-3">
              <div class="card-body text-center">
                     <h1>Your Placed Orders is Empty</h1>
                 </div>
             </div>
             @endif
      </div>
  </div>
</div>
       
@endsection
