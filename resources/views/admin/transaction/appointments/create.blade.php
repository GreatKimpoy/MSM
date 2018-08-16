@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Service Appointment</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Service Appointment</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
<section class="content-header">
  <div class="container-fluid">
    <div class="card col-sm-12 mt-3 card-success">
        <div class="card-header">
          <h5> APPOINTMENT SCHEDULER<h5>
        </div>
        <div class="card-body">
        	<form method="post" action="{{ url('appointments') }}" class="form-horizontal">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            @include('errors.alert')
	            @include('admin.transaction.appointments.form')
	            <div class="form-group">
	                <button type="submit" class="btn btn-success btn-block">Save</button>
	            </div>
	        </form>
        </div>
    </div>

  </div>
   <div class="card col-sm-12 mt-3 card-success">
        <div class="card-header">
          <h5> SERVICE CALENDAR<h5>
        </div>
        <div class="card-body">

          {!! $calendar_details->calendar() !!}
         
        </div>
    </div>

  </div>
</section>



{!! $calendar_details->script() !!}

@endsection