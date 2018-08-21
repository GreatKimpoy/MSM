@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Service Maintenance</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Service</li>
        <li class="breadcrumb-item active">{{ $service->name }}</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
<section class="content-header">
  <div class="container-fluid">
    <div class="card col-sm-12 mt-3">
      <div class="card-block pt-3">
        <div class="card-header bg-primary"><strong>List Form</strong></div>
          <div class="card-body">
             <form method="post" action="{{ url("service/$service->id") }}" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                @include('errors.alert')
                @include('admin.maintenance.service.form')
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection