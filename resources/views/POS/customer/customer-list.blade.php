@extends('dashboard')

@section('title', 'Customer List')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Customer List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card p-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="card-title text-bold">Customer List</h2>
                                <a class="btn btn-success btn-md" href="{{ route('customers.create') }}">Add Customer</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="tableData">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px" class="text-center">Serial</th>
                                            <th class="w-25">Name</th>
                                            <th class="w-25">Email</th>
                                            <th class="w-25">Phone</th>
                                            <th style="width: 50px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="customerList">
                                        @foreach($customers as $key => $customer)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $customers->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
    .card-header::after {
        display: none;
    }
    .pagination {
        justify-content: end !important;
    }
    p.small.text-muted {
        margin-right: 100px !important;
    }
</style>

@endsection
