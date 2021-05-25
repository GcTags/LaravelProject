@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Update Product</h4>
                </div>
                <div class="card-body">
                    <div class="card-body ">
                        {{-- @if ($order->img != '')
                        <img src="{{asset('/storage/img/'.$order->img)}}" style="width:20%;">
                        @endif --}}
                    </div>
                    {{-- <form  action="{{ route('sales.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf --}}
                        <div class="form-group row">
                            <label for="ProductName" class="col-sm-3 col-form-label">{{ __('Product Status') }}</label>

                            <div class="col-sm-9">
                                <input type="text" name="ProductName" id="ProductName"
                                    class="form-control @error('ProductName') is-invalid @enderror" value="{{$order->status}}"  autofocus>

                                @error('ProductName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                        </div>


                <div class="modal-footer">
                    <a type="button" class="btn btn-danger btn-md" href="{{ route('products.index') }}">Exit</a>
                    <button type="submit" class="btn btn-primary btn-md ">Save Changes</button>                
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    </div>
@endsection
