@extends('dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">All Informations</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-2">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $customers->count() }}</h3>
                            <p>Customers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('customers.index') }}"
                            class="small-box-footer d-flex justify-content-between align-items-center pl-2 pr-2">
                            <p class="mb-0">More info</p> <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="col-lg-2">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $categories->count() }}</h3>
                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <a href="{{ route('categories.index') }}"
                        class="small-box-footer d-flex justify-content-between align-items-center pl-2 pr-2">
                        <p class="mb-0">More info</p> <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Products -->
            <div class="col-lg-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $products->count() }}</h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="{{ route('products.index') }}"
                        class="small-box-footer d-flex justify-content-between align-items-center pl-2 pr-2">
                        <p class="mb-0">More info</p> <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>   
            
            <!-- Invoices -->
            <div class="col-lg-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $invoices->count() }}</h3>
                        <p>Invoices</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="{{ route('invoices.index') }}"
                        class="small-box-footer d-flex justify-content-between align-items-center pl-2 pr-2">
                        <p class="mb-0">More info</p> <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Total Invoices -->
            <div class="col-lg-2">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $totalinvoice }}</h3>
                        <p>Total Sales</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <a href="{{ route('invoices.index') }}"
                        class="small-box-footer d-flex justify-content-between align-items-center pl-2 pr-2">
                        <p class="mb-0">More info</p> <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection