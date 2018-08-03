@extends('admin.layouts.app')

@section('page-specific-head-content')
@endsection
@section('content')
<style>
  .form3{
    margin-left: 20px;
  }
  .textthree{
    margin-left: 20px;
  }
  .asterisks{
    color: red;
  }
  .cbox{
    margin-top: 40px;
    padding-left: 20px;
  }

</style>

<body class="hold-transition sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     {!! Form::open(['action' => 'MaintenanceController@addService', 'method' => 'POST']) !!}

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">CREATE SERVICE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                 
                  <div class="form-group">

                    <label for="text1" class="textone">Service<span class="asterisks">*</span></label>
                        {{Form::text('strServiceName', '',
                           ['class' => 'form-control form1', 
                           'placeholder' => 'Service Name',
                           'maxlength' =>'50',
                           'required'])
                          }}
                  
                  </div>
                    <div class="form-group">
                            {{Form::label('lblMechSpec', 'Assign mechanic specialization', ['style' => 'font-weight: bold'])}}
                          <select data-placeholder="Select specialization" class="custom-select" name="IdSpec">
                            <option selected>Select Category</option>
                            @forelse($specializations as $specialization)
                            <option value="{{ $specialization->strCategoryId }}">{{ $specialization->strCategoryName }}</option>
                            @empty
                              <option>None</option>
                            @endforelse
                          </select>
                    </div>

                      <div class="form-group">

                        <label for="text1" class="textone">Description<span class="asterisks">*</span></label>
                            {{Form::text('strServiceDesctiption', '',
                               ['class' => 'form-control form1', 
                               'placeholder' => 'Service Description',
                               'maxlength' =>'50',
                               'required'])
                              }}
                      
                      </div>


                     <div class="form-group">
                            {!! Form::label('fltPrice', 'Price') !!}<span>*</span>
                            <div class="input-group">
                                <span class="input-group-addon">PhP</span>
                                {!! Form::text('fltPrice',null,[
                                    'class' => 'form-control',
                                    'placeholder'=>'Price',
                                    'required']) 
                                !!}
                    </div>



                  <div class="form-group">

                    <label for="text1" class="textone">Warranty<span class="asterisks">*</span></label>

                    <label for="text1" class="textone">MONTH<span class="asterisks">
                        {{Form::text('strValidity', '',
                           ['class' => 'form-control form1', 
                           'placeholder' => 'Enter Brand',
                           'maxlength' =>'50',
                           'required'])
                          }}
                  
                  </div>



                <!-- /.card-body -->
              </div>
            </form>
            <div class="card-footer ">
                 {{ Form::submit('Save', ['class' => 'btn btn-sm bg-success pull-right']) }}
                    {!! Form::close() !!}
            </div>       
          </div>
          <!-- /.card -->
        </div>
        
          <!-- /.card -->
         
        </div>
</body>

@section('page-specific-foot-content')

@endsection
@endsection