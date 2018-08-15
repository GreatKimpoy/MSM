@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<style>

	.btn{
		margin-top: 30px;
	}

	#card1{
		margin-top: 20px;
	}


</style>

<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Job Orders</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Job Order</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection


@section('content-body')

<section class="content-header">
	<div class="container-fluid">
		<div class="card card-success col-sm-12" id="card1">
			<div class="card-header">
				<h4><strong>CUSTOMER INFORMATION</strong></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>CHOOSE EXISTING CUSTOMER</label>
							<select name="customer" class="form-control">
								<option>
									
								</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<a href="{{ url('job-order/create') }}" class="btn btn-primary" type="button" name="customer"><i class="fa fa-plus"></i> Create New Customer Record</a>
					</div>
				</div>
			</div>
		</div>

		<div class="card card-danger col-sm-12" id="card1">
			<div class="card-header">
				<h4><strong>VEHICLE INFORMATION</strong></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>CHOOSE EXISTING VEHICLE</label>
							<select name="vehicle" class="form-control">
								<option>
									
								</option>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>CHOOSE EXISTING MODEL</label>
							<select name="vehicle" class="form-control">
								<option>
									
								</option>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<a href="{{ url('job-order/vehicle-create') }}" class="btn btn-primary" type="button" name="vehicle"><i class="fa fa-plus"></i> Create New Vehicle Record</a>
					</div>
				</div>
			</div>
		</div>

		<div class="card card-warning col-sm-12" id="card1">
			<div class="card-header">
				<h4><strong>JOB ORDER ACTIVITY</strong></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>CHOOSE JOB ORDER ACTIVITY</label>
							<select name="activity" class="form-control">
								<option>
									
								</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

@endsection