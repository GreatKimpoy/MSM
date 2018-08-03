@extends('admin.layouts.app')

@section('page-specific-head-content')
<style>
	.asterisks{
    color: red;
  }

  	.img-responsive{
  		margin-left: 500px;	
  	}
  	.text{
  		margin-left: 540px;	
  	}
  	#file{
  		margin-left: 300px;	
  	}
</style>
@endsection
@section('content')


<body class="hold-transition sidebar-mini">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Technician</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">TECHNICIAN MAINTENANCE</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        	<p><strong><i>Note: All inputs with <span class="asterisks">*</span> are required fields</strong></p></i>
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Technician Information</h3>
            </div>
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-12">
	            		<div class="row">
		            		<div class="col-md-3">
		            			 {!! Form::open(['action' => 'MaintenanceController@addMechanicForm', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		            			<div class="form-group">
		            				<label for="Fname"> First Name<span class="asterisks">*</span></label>
		            				 {{Form::text('strFirstName', '',
		            				 ['class' => 'form-control', 
		            				 'placeholder' => 'First Name',
		            				 'maxlength' =>'100',
		            				 'required'])
		            				}}
		            				
		            			</div>
		            		</div>
		            		<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="Mname"> Middle Name</label>
		            				 {{Form::text('strMiddleName', '',
		            				 ['class' => 'form-control', 
		            				 'placeholder' => 'Middle Name',
		            				 'maxlength' =>'100',
		            				 'required'])
		            				}}
		            				
		            			</div>
	            			</div>
	            			<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="Lname"> Last Name<span class="asterisks">*</span></label>
		            				{{Form::text('strLastName', '',
			            				 ['class' => 'form-control', 
			            				 'placeholder' => 'Last Name',
			            				 'maxlength' =>'100',
			            				 'required'])
		            				}}
		            				
		            			</div>
		            		</div>
	            		</div>
	            		<div class="row">
		            		<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="bday"> Birthdate<span class="asterisks">*</span></label>
		            				<div class="input-group">
					                    <div class="input-group-prepend">
					                      	<span class="input-group-text"><i class="fa fa-calendar"></i></span>
					                    </div>
					                    	{{Form::text('dtmBirthdate', '',
					            				 ['class' => 'form-control', 'placeholder' => 'mm/dd/yy', 'id' => 'dateTimePicker'])
					            			}}
					                    	
	                  				</div>
		            			</div>
		            		</div>
		            		<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="Contact"> Contact <span class="asterisks">*</span></label>   	 
		            				<div class="input-group">
					                    <div class="input-group-prepend">
					                      	<span class="input-group-text"><i class="fa fa-phone"></i></span>
					                    </div>
					                    	{{Form::text('strContact', '',
					            				 ['class' => 'form-control',
					            				 'data-inputmask' => '"mask": "(639) 999 9999 99"', 
					            				 'placeholder' => '(+639) 999 9999 99',
					            				 'required'])
					            			}}
					                    	
					                </div>
		            			</div>
	            			</div>
	            			<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="email"> Email</label>
		            				{{Form::email('strEmail', '',
			            				 ['class' => 'form-control', 
			            				 'placeholder' => 'Email',
			            				 'required'])
		            				}}
		        
		            			</div>
		            		</div>
	            		</div>
	            		<div class="row">
		            		<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="street"> No. & St./Bldg.<span class="asterisks">*</span></label>
		            				{{Form::text('txtStreet', '',
			            				 ['class' => 'form-control', 
			            				 'placeholder' => 'No. & St./Bldg',
			            				 'maxlength' =>'100',
			            				 'required'])
		            				}}
		            				
		            			</div>
		            		</div>
		            		<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="barangay">Barangay./Subd <span class="asterisks">*</span></label>
		            				{{Form::text('txtBrgy', '',
			            				 ['class' => 'form-control', 
			            				 'placeholder' => 'Barangay/Subd',
			            				 'maxlength' =>'100',
			            				 'required'])
		            				}}
		            				
		            			</div>
	            			</div>
	            			<div class="col-md-3">
		            			<div class="form-group">
		            				<label for="city"> City/Municipality.<span class="asterisks">*</span></label>
		            				{{Form::text('txtCity', '',
			            				 ['class' => 'form-control', 
			            				 'placeholder' => 'City/Municipality',
			            				 'maxlength' =>'100',
			            				 'required'])
		            				}}
		            				
		            			</div>
		            		</div>
	            		</div>
	            		<div class="row">
	            			<div class="col-md-9">
	            				 <div class="form-group">
		            				 	<label for="tech"> Technician Specialization<span class="asterisks">*</span></label>
		                             	<select class="form-control select2" name="idSpec" multiple="multiple" data-placeholder="Select Specialization"
		                                        style="width: 100%;">
		                                       @forelse($specializations as $specialization)
										          <option value="{{ $specialization->CategoryId }}">{{ $specialization->strCategoryName }}</option>
										       @empty
										            <option>None</option>
										       @endforelse
		                                </select>
	                         	</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="col-md-4">
	                    <div class="row">
	                        <center><img class="img-responsive" src="{{asset('material/dist/img/avatar.png')}}" style="max-width:150px; background-size: contain" />
	                        </center>
	                        <center>
	                        	<label class="text">Technician Picture</label>
		                            {!! Form::file('image',[
		                                'class' => 'form-control',
		                                'name' => 'image',
		                                'class' => 'btn btn-success btn-sm',
		                                'onchange' => 'readURL(this)']) 
		                            !!}
	                           
	                        </center>
	                    </div>
                	</div>
            	</div>
            </div>
            <div class="card-footer">
            	
            	{!! Form::submit('SUBMIT', ['class' => 'btn btn-sm  btn-block btn-flat bg-success pull-right']) !!}
            {!! Form::close() !!}
            	
            </div>
          </div>
            }
            }
      	</div>
      	<!-- /.card -->
  	</div>
  </section>
        
  <script>
  	$('#dateTimePicker').dateTimePicker({
  		format: 'yyyy-mm-dd'
  	});
  </script>
</body>

@section('page-specific-foot-content')

@endsection
@endsection