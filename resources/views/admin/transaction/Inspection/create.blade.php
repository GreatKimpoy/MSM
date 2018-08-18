@extends('admin.layouts.app')

@section('content-header')

<style>


</style>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Inspection</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('inspection') }}">Inspection</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
<section class="content-header">
  <div class="container-fluid">
    <div class="card col-sm-12 mt-3">

      <div class="card-header bg-danger">
        <strong><center><h5>MIDSOUTH QUALITY VEHICLE INSPECTION </h5></center></strong>
      </div>

      <div class="card-body">
            @include('errors.alert')
            @include('admin.transaction.inspection.form')
            </div>
        </form>
      </div>
      

    </div>

    <div class="card col-sm-12 mt-3">
          <div class="card-header bg-warning">
            <strong><h5><center>INSPECTION CHECK-LIST</center></h5></strong>
          </div>
          <div class="card-block pt-3">

          </div>

          <div class="card-body">

            <form method="post" action="{{ url('inspection') }}" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  @include('admin.transaction.inspection.list')
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>

            </form>

          </div>
    </div>

  </div>
</section>
@endsection
