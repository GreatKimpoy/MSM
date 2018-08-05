@extends('admin.layouts.app')

@section('content')
@include('modal.category.index')
<body class="hold-transition sidebar-mini">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Category Maintenance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Service Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col-sm-3 pull-right">
                <a data-toggle="modal" data-target="#myModal" type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-plus" >  Add Service Category</i></a>
              </div>
                <h3 class="card-title">Service Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr> 
                      <th>Name</th>
                      <th>Description</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($categories as $service_cat)
                  <tr>
                    <td>{{ $service_cat->strCategoryName }}</td>
                    <td>{{ $service_cat->strDescription }}</td>
                    <td><a href="{{ url('category/1') }}" class="btn btn-primary">View</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </body>
@endsection

