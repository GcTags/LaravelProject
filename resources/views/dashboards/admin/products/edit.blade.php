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
                        @if ($product->img != '')
                        <img src="{{asset('/storage/img/'.$product->img)}}" style="width:20%;">
                        @endif
                    </div>
                    <form  action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="ProductName" class="col-sm-3 col-form-label">{{ __('Product Name') }}</label>

                            <div class="col-sm-9">
                                <input type="text" name="ProductName" id="ProductName"
                                    class="form-control @error('ProductName') is-invalid @enderror" value="{{$product->ProductName}}"  autofocus>

                                @error('ProductName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ProductDescription"
                                class="col-sm-3 col-form-label ">{{ __('Description') }}</label>

                            <div class="col-sm-9">
                                <input type="text" name="ProductDescription" id="ProductDescription"
                                    class="form-control  @error('ProductDescription') is-invalid @enderror" value="{{$product->ProductDescription}}" 
                                    autofocus>
                                @error('ProductDescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Price" class="col-sm-3 col-form-label ">{{ __('Price') }}</label>

                            <div class="col-sm-9">
                                <input type="text" name="Price" id="Price"
                                    class="form-control  @error('Price') is-invalid @enderror" value="{{$product->Price}}"  autofocus>
                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Stock" class="col-sm-3 col-form-label ">{{ __('Stock') }}</label>

                            <div class="col-sm-9">
                                <input type="text" name="Stock" id="Stock"
                                    class="form-control  @error('Stock') is-invalid @enderror" value="{{$product->Stock}}"  autofocus>
                       
                                @error('Stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Status" class="col-sm-3 col-form-label ">{{ __('Status') }}</label>

                            <div class="col-sm-9">
                                <input type="text" name="Status" id="Status"
                                    class="form-control  @error('Status') is-invalid @enderror" value="{{$product->Status}}"  autofocus>
                                           
                                @error('Status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger btn-md " href="{{ route('products.index') }}">Exit</a>
                    <button type="submit" class="btn btn-primary btn-md ">Save Changes</button>                
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
