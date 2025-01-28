@extends('dashboard')

@section('title', 'Product List')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Product List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="card-title text-bold">Product List</h2>
                                <a class="btn btn-success btn-md" href="{{ route('products.create') }}">Add Product</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="tableData">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px" class="text-center">Serial</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Tag</th>
                                            <th>Vendor</th>
                                            <th>Image</th>
                                            <th style="width: 50px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="productList">
                                        @foreach($products as $key => $product)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->tag }}</td>
                                            <td>{{ $product->vendor }}</td>
                                            <td>
                                                @if($product->image)
                                                <img src="{{ asset($product->image) }}" alt="Product Image" width="50">

                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $products->links('pagination::bootstrap-5') }}
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
