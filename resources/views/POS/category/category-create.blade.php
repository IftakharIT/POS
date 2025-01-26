@extends('dashboard')

@section('title', 'Create Category')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Create Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                                <h3 class="card-title">Category Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('categories.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="name">Category Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>                                    
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
</div>

@endsection