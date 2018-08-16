<style>
	.appointmentName{
		margin-top: 1px;
	}

	.asterisks{
        color: red;
        font-size: 20px;
    }
    h4{
    	color: green;
    }
    .head{
    	margin-top: 20px;
    }
    #forms{
    	margin-bottom: 20px;
    }
</style>



<div class="row">
	<h4 class="head">Appointment Details</h4>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label for="customer"><strong>CHOOSE EXISTING CUSTOMER</strong></label>
				<select name="customer" class="form-control select2">
						<option>
										
						</option>
				</select>
		</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-6">
		<label for="appointment" class="start"><strong>START DATE</strong><span class="asterisks"><strong>*</strong></span></label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-calendar"></i></span>
			</div>
			<input 
				class="form-control"
				type="date" 
				name="appointment_start"
				required 
				>
		</div>
	</div>
	<div class="col-md-6">
		<label for="appoinment" class="end"><strong>END DATE</strong><span class="asterisks"><strong>*</strong></span></label>
		<div class="input-group" id="forms">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-clock"></i></span>
			</div>
			<input 
			class="form-control" 
			type="date" 
			name="appoinment_end"
			>
		</div>
	</div>
</div>
