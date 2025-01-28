@extends('dashboard')

@section('title', 'Create Customer')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Create Customer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Customer Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('customers.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="name">Customer Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Customer Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('email') has-error @enderror">
                                        <label for="email">Customer Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Customer Email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('phone') has-error @enderror">
                                        <label for="phone">Customer Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Customer Phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection
