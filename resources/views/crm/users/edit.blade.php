@extends('crm.master')
@section('title','Edit User')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Create User</h2>
                    <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a
                        wide variety of forms.</p>
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Create User</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('crm.users.update',['user' => $user]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Username</label>
                                            <input type="text" name="name" id="simpleinput" class="form-control"
                                                value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-email">Email</label>
                                            <input type="email" name="email" id="example-email" class="form-control"
                                            value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-password">Password</label>
                                            <input type="password" name="password" id="example-password" class="form-control"
                                                placeholder="password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simple-select2">Role</label>
                                            <select class="form-control select2" name="role" id="simple-select2">
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div class="m-auto">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                </div>
                            </form>
                        </div>
    </main>
@endsection
