@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12-md-8">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-12">
                                <a class="btn button btn-info" href="/products/create">Add New Product</a>
                            </div> -->
                            <div class="col-12">
                                <form class="form-inline my-2 my-lg" method="GET"
                                    action="{{ route('users.index') }}" role="search">
                                    <input 
                                        class="form-control mr-sm-2" 
                                        type="text" 
                                        placeholder="Search"
                                        aria-label="Search"
                                        name="term"
                                        id="term">
                                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                                    <a href="{{ route('users.index') }}" class=" mt-1">
                                        <span class="input-group-btn">
                                            <button type="button" title="Refresh page">i cant use icons for refresh
                                            <!-- <i class="icon-refresh"></i> 
                                            <i class="fas fa-redo-alt"></i> -->
                                            </button> 
                                        </span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <caption>User Table</caption>
                        <table class="table caption-top">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col-12">Name</th>
                                        <th scope="col-12">Email</th>
                                        <th scope="col-12">Address</th>
                                        <th scope="col-12">Contact</th>
                                        <th scope="col-12">Created at</th>
                                        <th scope="col-12">Updated at</th>
                                        <th scope="col-12">Email Status</th>
                                        <th scope="col-12">Deletion Status</th>
                                        <th scope="col-12">Action</th>
                                    </tr>
                                </thead>
                            @foreach ($users as $user)
                                @if ($user->role === 2)
                                <tbody>
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->contact }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        @if ($user->email_verified_at === NULL)
                                        <td>Pending</td>
                                        @else
                                        <td>Verified</td>
                                        @endif
                                        @if ($user->deleted_at === NULL)
                                        <td>Active</td>
                                        @else
                                        <td>Deactivated</td>
                                        @endif
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    @if ($user->deleted_at === NULL)
                                                        <form method="POST"
                                                            action="{{ route('users.destroy', $user->id) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                        </form>
                                                    @else
                                                        <form method="POST"
                                                            action="{{ route('users.update', $user->id) }}">
                                                            <button class="dropdown-item text-success" type="submit">Activate</button>
                                                            @method('PUT')
                                                            @csrf
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
    
