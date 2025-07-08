@extends('crm.master')
@section('title','Users')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Users</h2>
                    <x-success-alert-message></x-success-alert-message>
                    <div class="row">
                        <!-- simple table -->
                        <div class="col-md-12 my-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div>
                                    </div>
                                    <div>
                                        <h5 class="card-title">Users Table</h5>
                                        @hasrole('Admin')
                                        <a href="{{ route('crm.users.create') }}" style="float: right"  class="btn btn-primary mb-3">Create User</a>
                                        @endhasrole
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Role</th>
                                                @hasrole('Admin')
                                                <th>Action</th>
                                                @endhasrole
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    @foreach($user->roles as $role)
                                                            @if($role->name == 'Admin')
                                                            <span class="badge bg-danger text-white p-2">{{ $role->name }}</span>
                                                            @else
                                                            <span class="badge bg-success text-white p-2">{{ $role->name }}</span>
                                                            @endif
                                                    @endforeach
                                                </td>
                                                @hasrole('Admin')
                                                <td class="d-flex gap:5">
                                                    <a href="{{ route('crm.users.edit',['user' => $user]) }}" class="btn btn-info mr-2">Edit</a>
                                                    <form action="{{ route('crm.users.destroy',['user' => $user]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                                @endhasrole
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->render('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
@endsection
