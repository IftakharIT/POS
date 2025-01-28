@extends('dashboard')

@section('title', 'Invoices')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Invoices</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="card-title text-bold">Invoices</h2>
                                <a class="btn btn-success btn-md" href="{{ route('invoices.create') }}">Create Invoice</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="tableData">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px" class="text-center">Serial</th>
                                            <th class="w-25">Customer</th>
                                            <th class="w-25">Invoice Date</th>
                                            <th class="w-25">Total Amount</th>
                                            <th style="width: 50px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $key => $invoice)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $invoice->customer->name }}</td>
                                            <td>{{ $invoice->invoice_date }}</td>
                                            <td>{{ $invoice->total_amount }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this invoice?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $invoices->links('pagination::bootstrap-5') }}
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
