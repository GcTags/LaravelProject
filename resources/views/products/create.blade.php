@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                    <label for="ProductName" class="col-md-4 col-form-label text-md-right">{{ __('Product Name')}}</label>
                    
                        <div class="col-md-6">
                            <input type="text" name="ProductName" id="ProductName" class="form-control @error('ProductName') is-invalid @enderror"  value="{{old('ProductName')}}"  autofocus>

                            @error('ProductName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                
                            @enderror
                        </div>
                    </div>

        
                    <div class="form-group row">
                        <label for="ProductDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description')}}</label>
                        
                            <div class="col-md-6">
                                <textarea type="text" name="ProductDescription" id="ProductDescription" class="form-control  @error('ProductDescription') is-invalid @enderror" value="{{old('ProductDescription')}}"  autofocus>
                                </textarea>
                                @error('ProductDescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Price')}}</label>
                            
                                <div class="col-md-6">
                                    <textarea type="text" name="Price" id="Price" class="form-control  @error('Price') is-invalid @enderror" value="{{old('Price')}}"  autofocus>
                                    </textarea>
                                    @error('Price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label for="Stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock')}}</label>
                                
                                    <div class="col-md-6">
                                        <textarea type="text" name="Stock" id="Stock" class="form-control  @error('Stock') is-invalid @enderror" value="{{old('Stock')}}"  autofocus>
                                        </textarea>
                                        @error('Stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="Status" class="col-md-4 col-form-label text-md-right">{{ __('Status')}}</label>
                                    
                                        <div class="col-md-6">
                                            <textarea type="text" name="Status" id="Status" class="form-control  @error('Status') is-invalid @enderror" value="{{old('Status')}}"  autofocus>
                                            </textarea>
                                            @error('Status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Post Image')}}</label>
                                    
                                        <div class="col-md-6">
                                            <input type="file" name="img" id="img" class="form-control-file @error('img') is-invalid @enderror"  value="{{old('img')}}"  autofocus>
            
                                            @error('img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                
                                            @enderror
                                        </div>
                                    </div>



                        <div class="form-group row md-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit')}}
                                </button>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection