@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Service Category Maintenance</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('service') }}">Service</a></li>
        <li class="breadcrumb-item"><a href="{{ url('service/category') }}">Category</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
<section class="content-header">
  <div class="container-fluid">
    <div class="card col-sm-12 mt-3">
      <div class="card-block pt-3">
<<<<<<< HEAD
        <div class="card-header bg-primary"><strong>Service Category</strong></div>
      </div>
      <div class="card-body">
        <form method="post" action="{{ url('service/category') }}" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('errors.alert')
            @include('admin.maintenance.service.category.form')
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
=======
        <div class="card-header bg-primary"><strong>Category Form</strong></div>
          <div class="card-body">
            <form method="post" action="{{ url('service/category') }}" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @include('errors.alert')
                @include('admin.maintenance.service.category.form')
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
          </div>
>>>>>>> 1.0
      </div>
    </div>
  </div>
</section>
@endsection