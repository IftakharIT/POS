@extends('dashboard')

@section('title', 'Invoice Details')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Invoice Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Invoice Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card p-3">
                            <div class="card-body">
                                <div class="logo d-flex justify-content-center">
                                    <img src="{{ asset('assets/images/MoneyUpWhite.png') }}" class="img-fluid m-auto" width="100px" height="100px" alt="">
                                </div>
                                <p>Customer Name: {{ $invoice->customer->name }}</p>
                                <p>Invoice Date: {{ $invoice->invoice_date }}</p>
                                <p>Total Amount: {{ $invoice->total_amount }}</p>
                                <h4>Products</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoice->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity * $item->price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('invoices.print', $invoice->id) }}" class="btn btn-primary">Print</a>
                                    <a href="{{ route('invoices.download', $invoice->id) }}" class="btn btn-success">Download PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
