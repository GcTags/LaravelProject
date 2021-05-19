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
                                    <a style="margin-left:10px;" href="{{ route('users.index') }}" class=" mt-1">
                                            <!-- <i class="fa fa-refresh">I cant put icon for refresh</i> -->
                                            <!-- <i class="bi bi-arrow-counterclockwise"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                            </svg>
                                            <!-- <i class="icon-refresh">Refresh</i> 
                                            <i class="fas fa-redo-alt"></i> -->
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
                                            @if ($user->deleted_at === NULL)
                                            <div class="dropdown">
                                                <button class="btn btn-danger dropdown-toggle" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Delete
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <form 
                                                    method="POST"
                                                    action="{{ route('users.destroy', $user->id) }}">
                                                    <button type="submit" class="dropdown-item text-danger" id="delete_btn">You will delete <br> User: {{ $user->name }}</button>
                                                    @method('DELETE')
                                                    @csrf
                                                    </form>
                                            @else
                                                    <div class="dropdown">
                                                    <button class="btn btn-success dropdown-toggle" type="button"
                                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Activate
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <form method="POST"
                                                            action="{{ route('users.edit', $user->id) }}">
                                                            <button class="dropdown-item text-primary" type="submit">You will activate <br> User: {{ $user->name }}</button>
                                                            @method('GET')
                                                            @csrf
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endif

                                {{-- START DELETE MODAL --}}
                                    <div class="modal" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true"> 
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="Modal.com">Delete User</h4>
                                                    <button id="close_" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</spam>
                                                    </button>
                                                </div>

                                            <form>
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Will you delete? {{$user->id}}</label>
                                                            <!-- <input type="text" name="name" class="form-control" placeholder="Name: {{Auth::user()->name}}"> -->
                                                        </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <form 
                                                    method="POST"
                                                    action="{{ route('users.destroy', $user->id) }}">
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                        @method('DELETE')
                                                        @csrf id="close_" href="{{ route('users.index') }}
                                                    </form>
                                                    <form>
                                                    <button class="btn btn-primary" onclick="myFunction()">No</button>
                                                    </form>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                {{-- END DELETE MODAL--}}
                            @endforeach
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
        
    @endsection



    
