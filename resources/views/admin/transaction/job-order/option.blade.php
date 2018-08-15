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
			<div class="card-block pt-3">

				<div class="card-header card-success">
					<h4>JOB ORDER INFORMATION</h4>
				</div>

				<form method="post" action="{{ url('job-order') }}" class="form-horizontal">
		            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
		            <input type="hidden" name="type" value="JO" />
		            @include('errors.alert')
		            @include('admin.transaction.job-order.optionForm')
		            <div class="form-group">
		                <button type="submit" class="btn btn-primary btn-block"><strong>PROCEED</strong></button>
		            </div>
		        </form>


			</div>
		</div>

	</div>
</section>

@endsection