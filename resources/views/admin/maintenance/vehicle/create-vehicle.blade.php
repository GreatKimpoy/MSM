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
     {!! Form::open(['action' => 'MaintenanceController@addVehicle', 'method' => 'POST']) !!}

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">NEW VEHICLE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                 
                  <div class="form-group">

                    <label for="text1" class="textone">BRAND<span class="asterisks">*</span></label>
                        {{Form::text('strBrand', '',
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

            </div>       
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MODEL(S)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="row">
                      <div class="form-group">
                                  <label for="text2" class="texttwo">MODEL<span class="asterisks">*</span></label>
                                   {{Form::text('strModelName', '',
                                       ['class' => 'form-control form2', 
                                       'placeholder' => 'Enter Model',
                                       'maxlength' =>'50',
                                       'required'])
                                      }}
                               
                                
                      </div>
                     
                      <div class="form-group">
                            <div>
                                  <label for="text3" class="textthree">YEAR<span class="asterisks">*</span></label>
                                   {{Form::text('strYearMade', '',
                                       ['class' => 'form-control form3', 
                                       'placeholder' => 'YEAR',
                                       'maxlength' =>'50',
                                       'required'])
                                      }}
                                  
                            </div>
                      </div>

                       <div class="form-group">
                                  
                                  <label for="text2" class="texttwo">SIZE<span class="asterisks">*</span></label>
                                   {{Form::text('strSize', '',
                                       ['class' => 'form-control form2', 
                                       'placeholder' => 'Enter Size',
                                       'maxlength' =>'50',
                                       'required'])
                                      }}
                               
                                
                      </div>

                  </div>
                  <div class="row">
                        <div class="form-group">
                          <div class="col-md-3">
                                      <label for="text4" class="textfour">Transmission<span class="asterisks">*</span></label><br/>
                          </div>                                      
                       </div>
                       <div class="col-lg-6">
                         <div class="form-group">
                             <label class="checkbox-inline">
                                  
                                                        <input type="checkbox" class="check auto" name="hasAuto[]" value="1" > Automatic
                                                        
                                                  
                                                </label>
                                                 <label class="checkbox-inline">
                                                    
                                                        <input type="checkbox" class="check auto" name="hasManual[]" > Manual
                                                        
                                                  
                                                </label>
                         </div>
                      </div>
                    </div>

                </div>
              
            <div class="card-footer">
              
         
             
            </div>   
          </div>
          <!-- /.card -->
          {{ Form::submit('Save', ['class' => 'btn btn-sm bg-success pull-right']) }}
             {!! Form::close() !!}
        </div>
</body>

@section('page-specific-foot-content')

@endsection
@endsection