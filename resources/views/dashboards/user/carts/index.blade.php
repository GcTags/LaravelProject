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
                      <div class="card py-0">    
                        {{-- <a href="/products/{{$orderProduct->product_id}}" disabled> --}}
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
                                            Wish to delete this Product?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                                            <form method="POST" action="{{route('carts.destroy', $orderProduct->id)}} ">
                                              @method('DELETE')
                                              @csrf
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                             
                             
                                  </div>
                                <div class="col-md">
                                  <form method="POST" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-success">Checkout</button>       
                                  </div>
                                </div>
                              </div>            
                            </div> 
                          {{-- </a> --}}
                        </div>
                  </div>
             @endforeach
      </div>
  </div>
</div>
       
@endsection
