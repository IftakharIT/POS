@extends('dashboard')
@section('title', 'Update Category')

@section('styles')
    <style>
        .card-header::after {
            display: none;
        }
    </style>
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Update Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Category</li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        
                        <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data" id="myForm">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="row mb-12">
                                <label for="name" class="col-sm-12 col-form-label">Category Name</label>
                                <div class="col-sm-12">
                                    <input name="name" class="form-control" type="text" value="{{ $category->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-12 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Category">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Category Name',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

@endsection
