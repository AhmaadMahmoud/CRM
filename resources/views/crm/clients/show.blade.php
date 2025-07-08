@extends('crm.master')
@section('title','Edit Client')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Create Client</h2>
                    <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a
                        wide variety of forms.</p>
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Create client</strong>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">name</label>
                                            <input type="text" name="name" id="simpleinput" class="form-control"
                                                value="{{ $client->name }}" disabled>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-email">Email</label>
                                            <input type="email" name="email" id="example-email" class="form-control"
                                            value="{{ $client->email }}" disabled>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Company Name</label>
                                            <input type="text" name="company_name" id="simpleinput" class="form-control"
                                            value="{{ $client->company_name }}" disabled>
                                                @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Company Address</label>
                                            <input type="text" name="company_address" id="simpleinput" class="form-control"
                                            value="{{ $client->company_address }}" disabled>
                                                @error('company_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Company Phone</label>
                                            <input type="text" name="company_phone" id="simpleinput" class="form-control"
                                            value="{{ $client->company_phone }}" disabled>
                                                @error('company_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
    </main>
@endsection
