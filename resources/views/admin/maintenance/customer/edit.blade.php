@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
<<<<<<< HEAD
      <h1 class="float-left">Service Category Maintenance</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Service Category</li>
        <li class="breadcrumb-item active">{{ $category->name }}</li>
=======
      <h1 class="float-left">Mechanic Maintenance</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Mechanic</li>
        <li class="breadcrumb-item active">{{ $mechanic->name }}</li>
>>>>>>> 2c46f32e8e75771e8eeb51307c3614d51447a080
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
<section class="content-header">
  <div class="container-fluid">
    <div class="card col-sm-12 mt-3">
      <div class="card-block pt-3">
        <form method="post" action="{{ url("mechanic/$mechanic->id") }}" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            @include('errors.alert')
            @include('admin.maintenance.mechanic.form')
            <input type="hidden" name="type" value="mechanic" />
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection