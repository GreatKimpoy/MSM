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
	<h4>Basic Information</h4>
</div>



	<div class="row">
	    <div class="col-md-4">
	        <label for="lastname">Lastname</label><span class="asterisks"><strong>*</strong></span>
	        <div class="input-group">
	            <div class="input-group-prepend">
	                <span class="input-group-text"><i class="fa fa-user"></i></span>
	            </div>
	            <input 
	                class="form-control align-center" 
	                placeholder="Lastname" 
	                maxlength="50" 
	                required 
	                name="lastname" 
	                type="text"
	                id="lastname">
	        </div>
	    </div>

	    <div class="col-md-4">
	        <label for="firstname">Firstname</label><span class="asterisks"><strong>*</strong></span>
	        <div class="input-group">
	            <div class="input-group-prepend">
	                <span class="input-group-text"><i class="fa fa-user"></i></span>
	            </div>
	            <input 
	                class="form-control align-center" 
	                placeholder="Firstname" 
	                maxlength="50" 
	                required 
	                name="firstname" 
	                type="text"
	                id="firstname">

	        </div>
	    </div>

	    <div class="col-md-4">
	        <label for="firstname">Middlename</label><span class="asterisks"><strong>*</strong></span>
	        <div class="input-group">
	            <div class="input-group-prepend">
	                <span class="input-group-text"><i class="fa fa-user"></i></span>
	            </div>
	             <input 
	                class="form-control align-center" 
	                placeholder="Middlename" 
	                maxlength="50" 
	                required 
	                name="middlename" 
	                type="text"
	                id="middlename">

	        </div>
	    </div>
</div>

<div class="row">
	<div class="col-md-6">
        <label for="contact" class="labely">Contact Number</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i></span>
            </div>
            <input 
                class="form-control align-center" 
                placeholder="Contact Number" 
                maxlength="50" 
                required 
                name="contact" 
                type="text"
                id="contact"
				>
        </div>
    </div>

    <div class="col-md-6">
        <label for="email" class="labely">Email Address</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-at"></i></span>
            </div>
            <input 
                class="form-control align-center" 
                placeholder="Email Address" 
                maxlength="50" 
                required 
                name="email" 
                type="email"
                id="email"
                >
        </div>
    </div>
</div>


<div class="row">
	<h4 class="head">Appointment Details</h4>
</div>




<div class="row">
	<div class="col-md-6">
		<label for="appointmentDate">DATE<span class="asterisks"><strong>*</strong></span></label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-calendar"></i></span>
			</div>
			<input 
				class="form-control"
				type="date" 
				name="appointmentDate"
				required 
				>
		</div>
	</div>
	<div class="col-md-6">
		<label for="appoinmentTime">TIME<span class="asterisks"><strong>*</strong></span></label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-clock"></i></span>
			</div>
			<input 
			class="form-control" 
			type="time" 
			name="appoinmentTime"
			required>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6" id="forms">
		<label for="carModel">Car Model<span class="asterisks"><strong>*</strong></span></label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-car"></i></span>
			</div>
			<input type="text" class="form-control" name="carModel" required>
		</div>
	</div>
	<div class="col-md-6">
		<label for="plateNumber">Plate Number<span class="asterisks"><strong>*</strong></span></label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-car-side"></i></span>
			</div>
			<input type="text" 
			name="plateNumber" 
			class="form-control" 
			required>
		</div>
	</div>
</div>