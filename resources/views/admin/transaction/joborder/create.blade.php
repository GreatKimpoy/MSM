@extends('admin.layouts.app')


@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Job Order</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Job Order</li>
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
	        <div class="card-header bg-danger">
            <strong class="card-title">Customer Information Form</strong>
          </div>
	          <div class="card-body pt-3">
	           @include('errors.alert')
	           @include('admin.maintenance.customer.form')
	          </div>
	      </div>
    </div>


    <div class="card col-sm-12 mt-3">
    	<div class="card-block pt-3">
    		<div class="card-header bg-danger"><strong>  Job Details </strong>
    		</div>
    		<div class="card-body pt-3">
    			<form method="post" action="{{ url('joborder') }}" class="form-horizontal">
		            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
		            @include('admin.transaction.joborder.form')
		            <div class="form-group">
		                <button type="submit" class="btn btn-success btn-block">Save</button>
		            </div>
		        </form>
    		</div>
    	</div>
    </div>

  </div>
</section>
@endsection














