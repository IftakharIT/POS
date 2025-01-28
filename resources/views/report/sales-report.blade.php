@extends('dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Sales Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sales Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h2>Summary</h2>
                        <a href="{{ route('sales.report.download', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-primary">
                            <i class="fas fa-download"></i> Download PDF
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-success text-white">
                                <th style="width: 200px;">Report</th>
                                <th>Date</th>
                                <th style="width: 150px;">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sales Report</td>
                                <td>{{ $startDate }} to {{ $endDate }}</td>
                                <td>{{ $invoices->sum('total_amount') }}</td>                                
                            </tr>
                        </tbody>
                    </table>

                    <h2 class="mb-4 mt-5">Details</h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th class="text-center" style="width:100px;">Invoice No</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Items</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $key => $invoice)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $invoice->invoice_date }}</td>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ $invoice->items->pluck('product.name')->implode(', ') }}</td>
                                    <td>{{ $invoice->total_amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection