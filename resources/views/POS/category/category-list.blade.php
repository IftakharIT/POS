@extends('dashboard')

  @section('content')
      <div class="content-wrapper">
          <div class="container-fluid">
              <!-- Content Header -->
              <div class="content-header">
                  <div class="container-fluid">
                      <div class="row mb-2">
                          <div class="col-sm-6">
                              <h1 class="m-0">Category List</h1>
                          </div>
                          <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                  <li class="breadcrumb-item active">Categories</li>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
  
              <!-- Main content -->
              <section class="content">
                  <div class="container-fluid">
                       <div class="row">
                        <div class="col-md-6">
                            <div class="card p-3">
                              <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="card-title text-bold">Bordered Table</h2>
                                <a class="btn btn-success btn-md category" href="{{ route('categories.create') }}">Add Category</a>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="width: 30px" class="text-center">Serial</th>
                                      <th class="w-50">Name</th>
                                      <th class="text-center w-25">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr>
                                      <td class="text-center">{{ $key + 1 }}</td>
                                      <td>{{ $category->name }}</td>
                                      <td class="text-center"><span class="badge bg-{{ $category->status ? 'success' : 'danger' }}">{{ $category->status ? 'Active' : 'Inactive' }}</span></td>
                                    </tr>
                                    @endforeach                                  
                                  </tbody>
                                </table>
                              </div>
                               
                          </div>
                       </div>
                  </div>
              </section>
          </div>
      </div>

    <style>
        .card-header::after {
            display: none;        }
    </style>
    
  @endsection


  
