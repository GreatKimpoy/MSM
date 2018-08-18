@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Part Maintenance</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Part</li>
        <li class="breadcrumb-item active">Create </li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
<section class="content-header">
  <div class="container-fluid">
    <div class="card col-sm-12 mt-3">
      <div class="card-block pt-3">
        <div class="card-header bg-primary"><strong>Vehicle Part Form</strong></div>
      </div>
      <div class="card-body">
        <form method="post" action="{{ url('vehicle/part') }}" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('errors.alert')
            @include('admin.maintenance.vehicle.part.form')
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection