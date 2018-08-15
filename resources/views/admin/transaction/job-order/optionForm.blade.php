	

	<style >
		.labely{
			margin-top: 20px;
		}
		#forms{
			padding-left: 20px;
		}

		.btn{
			margin-top: 50px;
		}
	</style>



	<div class="row">

		<div class="col-md-6">
			<div class="form-group" id="forms">
				<label class="labely">CHOOSE EXISTING CUSTOMER</label>
					<select name="customer" class="form-control select2">
						<option>
									
						</option>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="forms">
				<a href="{{ url('job-order/create') }}" class="btn btn-primary" type="button" name="customer"><i class="fa fa-user-plus"></i> <strong>CREATE NEW CUSTOMER RECORD</strong></a>
			</div>
		</div>


	</div>


	<div class="row">
		
		<div class="col-md-6" >
			<div class="form-group" id="forms">
				<label class="labely">CHOOSE EXISTING VEHICLE</label>
					<select name="vehicle" class="form-control select2" data-live-search="true">
						<option>
									
						</option>
					</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="forms">
				<label class="labely">CHOOSE EXISTING MODEL</label>
					<select name="vehicle" id="basic" class="form-control select2" ">
						<option>
									
						</option>
					</select>
			</div>
		</div>

	</div>

	<div class="row">
		
		<div class="col-md-12">
			<div class="form-group" id="forms">
				<label class="label">CHOOSE JOB ORDER ACTIVITY</label>
				<select name="activity" class="form-control select2">
					<option>
									
					</option>
				</select>
			</div>
		</div>

	</div>