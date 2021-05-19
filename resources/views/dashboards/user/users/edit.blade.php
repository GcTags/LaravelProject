@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header text-center">
                    <h4>User Profile Update</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">{{ __('name') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"  autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email"
                                    class="col-sm-3 col-form-label ">{{ __('email') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" name="email" id="email"
                                        class="form-control  @error('email') is-invalid @enderror" value="{{$user->email}}" 
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label ">{{ __('address') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" name="address" id="address"
                                        class="form-control  @error('address') is-invalid @enderror" value="{{$user->address}}"  autofocus>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact" class="col-sm-3 col-form-label ">{{ __('contact') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" name="contact" id="contact"
                                        class="form-control  @error('contact') is-invalid @enderror" value="{{$user->contact}}"  autofocus>
                        
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate" class="col-sm-3 col-form-label ">{{ __('birthdate') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" name="birthdate" id="birthdate"
                                        class="form-control  @error('birthdate') is-invalid @enderror" value="{{$user->birthdate}}"  autofocus>
                                            
                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img" class="col-sm-3 col-form-label ">{{ __('Post Image') }}</label>

                                <div class="col-sm-9">
                                    <input type="file" name="img" id="img"
                                        class="form-control-file @error('img') is-invalid @enderror" value="" autofocus>

                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                    @enderror
                                </div>
                            
                            </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-success" href="{{ route('products.index') }}">Exit</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection