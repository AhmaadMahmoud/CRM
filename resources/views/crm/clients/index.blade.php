@extends('crm.master')
@section('title', 'Clients')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Clients</h2>
                    <x-success-alert-message></x-success-alert-message>
                    <div class="row">
                        <!-- simple table -->
                        <div class="col-md-12 my-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div>
                                    </div>
                                    <div>
                                        <h5 class="card-title">clients Table</h5>
                                        @hasrole('Admin')
                                            <a href="{{ route('crm.clients.create') }}" style="float: right"
                                                class="btn btn-primary mb-3">Create client</a>
                                        @endhasrole
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.</p>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Company Name</th>
                                                <th>Company Address</th>
                                                <th>Company Phone</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr class="clickable-row"
                                                    data-url="{{ route('crm.clients.show', ['client' => $client]) }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $client->name }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>{{ $client->company_name }}</td>
                                                    <td>{{ $client->company_address }}</td>
                                                    <td>{{ $client->company_phone }}</td>
                                                    <td>{{ $client->created_at }}</td>
                                                    <td class="d-flex gap:5">
                                                        <a href="{{ route('crm.clients.edit', ['client' => $client]) }}"
                                                            class="btn btn-info mr-2">Edit</a>
                                                        <form
                                                            action="{{ route('crm.clients.destroy', ['client' => $client]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        document.querySelectorAll('.clickable-row').forEach(function(row) {
                                                            row.addEventListener('click', function() {
                                                                window.location = this.dataset.url;
                                                            });
                                                        });
                                                    });
                                                </script>
                                                <style>
                                                    .clickable-row {
                                                        cursor: pointer;
                                                    }
                                                </style>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $clients->render('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
@endsection
