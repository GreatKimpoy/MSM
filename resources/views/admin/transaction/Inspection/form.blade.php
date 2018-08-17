
<style>
	.grey{
		background-color: #909090;
		color: white;
	}
	.red{
		color: red;
	}
	.green
	{
		color: green;
	}
	.orange{
		color:#FFD91B;
	}

	  .asterisks{
        color: red;
    }
    .labely{
        margin-top: 10px;
    }
    #forms{
        margin-bottom: 20px;
    }
    #cardly{
    	margin-top: 20px;
    }
</style>

<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label for="customer"><strong>Customer Name</strong><span class="asterisks">*</span></label>
				<select name="customer" class="form-control select2">
						<option>
										
						</option>
				</select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="make"><strong>Make</strong><span class="asterisks">*</span></label>
				<select name="make" class="form-control select2">
						<option>
										
						</option>
				</select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="model"><strong>Model</strong><span class="asterisks">*</span></label>
				<select name="model" class="form-control select2">
						<option>
										
						</option>
				</select>
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<label for="year"><strong>Year</strong><span class="asterisks">*</span></label>
				<select name="year" class="form-control select2">
						<option>
										
						</option>
				</select>
		</div>
	</div>

</div>

<div class="row">
	
	<div class="col-md-6">
		<div class="form-group">
			<label for="date"><strong>Inspection Date</strong><span class="asterisks">*</span></label>
			<div class="input-group" id="forms">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
				</div>
				<input 
				class="form-control" 
				type="date" 
				name="date"
				>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label for="technician"><strong>Technician Assigned</strong><span class="asterisks">*</span></label>
				<select name="technician" class="form-control select2">
						<option>
										
						</option>
				</select>
		</div>
	</div>


</div>

