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
<<<<<<< HEAD
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


<div class="row">
=======
>>>>>>> 1.0
	<div class="col-md-6">
		<label for="appointment" class="start"><strong>START DATE</strong><span class="asterisks"><strong>*</strong></span></label>
			<input 
				class="form-control"
				type="date" 
				name="appointment_start"
				required 
				>
	</div>
	<div class="col-md-6">
		<label for="appoinment" class="end"><strong>END DATE</strong><span class="asterisks"><strong>*</strong></span></label>
		<div id="forms">
			<input 
			class="form-control" 
			type="date" 
			name="appoinment_end"
			>
	</div>
</div>
