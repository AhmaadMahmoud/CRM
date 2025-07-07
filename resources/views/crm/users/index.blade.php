@extends('crm.master')
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
                                        <a href="{{ route('crm.users.create') }}" style="float: right"  class="btn btn-primary mb-3">Create User</a>
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
                                                <th>Action</th>
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
                                                <td class="d-flex gap:5">
                                                    <a href="{{ route('crm.users.edit',['user' => $user]) }}" class="btn btn-info mr-2">Edit</a>
                                                    <form action="{{ route('crm.users.destroy',['user' => $user]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
@endsection
