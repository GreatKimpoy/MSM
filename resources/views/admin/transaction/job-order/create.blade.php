 @extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Job Orders</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Job Orders</li>
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
          <div class="card-header bg-primary">
              <strong>Customer Form</strong>
          </div>
      </div>
      <div class="card-body">
        <form method="post" action="{{ url('job-order') }}" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            @include('errors.alert')
            <section id="customer-information-form">
            <!-- include a customer information form -->
            <!-- options to choose from existing customer -->
            <!-- or add a new customer form -->
            </section>
            <section id="vehicle-information-form">
            <!-- include also a vehicle form -->
            <!-- choose from existing vehicle -->
            <!-- or add a new vehicle -->
            </section>
            <section id="starting-point-form">
            <!-- select option for starting point -->
            <!-- a select option with the following choices: -->
            <!-- inspection, appointment, or directly job order -->
            </section>

             @include('admin.transaction.job-order.form')

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection