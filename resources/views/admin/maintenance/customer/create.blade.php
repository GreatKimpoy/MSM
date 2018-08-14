@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Customer Maintenance</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Customer</li>
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
        <form method="post" action="{{ url('customer') }}" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="type" value="customer" />
            @include('errors.alert')
            @include('admin.maintenance.customer.form')
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection