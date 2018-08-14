
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
</style>

<div class = "form">
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
                id="lastname"
                value="{{ isset($mechanic->lastname) ? $mechanic->lastname : old('lastname') }}">
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
                id="firstname"
                value="{{ isset($mechanic->firstname) ? $mechanic->firstname : old('firstname') }}">

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
                id="middlename"
                value="{{ isset($mechanic->middlename) ? $mechanic->middlename : old('middlename') }}">

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
       <label for="street" class="labely">Street</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book"></i></span>
            </div>
              <input 
                class="form-control align-center" 
                placeholder="Street" 
                maxlength="50" 
                required 
                name="street" 
                type="text"
                id="street"
                value="{{ isset($mechanic->barangay) ? $mechanic->barangay : old('barangay') }}">

        </div>
    </div>

    <div class="col-md-4">
        <label for="street" class="labely">Barangay</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book"></i></span>
            </div>
              <input 
                class="form-control align-center" 
                placeholder="Barangay" 
                maxlength="50" 
                required 
                name="barangay" 
                 type="text"
                id="barangay"
                value="{{ isset($mechanic->barangay) ? $mechanic->barangay : old('barangay') }}">

        </div>
    </div>

    <div class="col-md-4">
        <label for="city" class="labely">City</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book"></i></span>
            </div>
              <input 
                class="form-control align-center" 
                placeholder="City" 
                maxlength="50" 
                required 
                name="city" 
                type="text"
                id="city"
                value="{{ isset($mechanic->city) ? $mechanic->city : old('city') }}">

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="birthdate" class="labely">Birthdate</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
            <input 
                class="form-control align-center" 
                placeholder="Birthdate" 
                maxlength="50" 
                required 
                name="birthdate" 
                type="date"
                id="birthdate"
                value="{{ isset($mechanic->birthdate) ? $mechanic->birthdate : old('birthdate') }}">

        </div>
    </div>

    <div class="col-md-4">
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
                value="{{ isset($mechanic->contact) ? $mechanic->contact : old('contact') }}">
        </div>
    </div>

    <div class="col-md-4">
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
                value="{{ isset($mechanic->email) ? $mechanic->email : old('email') }}">
        </div>
    </div>
</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h6>Inspection Items</h6>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-center">
							 <tr>
				                    <th class="grey">1. Inside Car</th>
				                    <th class="bg-danger">NG</th>
				                    <th class="bg-warning">C</th>
				                    <th class="bg-success">OK</th>
				            </tr>
				            <tr>
				            	<td class="">1) Seat Belts/Head Rests Operation</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">2) Shift Lever/ Clutch,Operation</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">3) Foot Brake Function</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">4) Parking Brake Function</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">5) Door & Inside rear view Mirror</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">6) Indicator & Warming Lamp</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">7)Engine Starting Condition</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">8) Horn Sound</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">9) Wiper Blades/ Nozzle</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">10) Power windows Swithches</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">11) Door Locks</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">12) Each Light / Lamps <br>
				            		Light: Head lights, Daytime Running Light<br>
				            		Lamp: Turn Signal, Hazard, Brake, Position, Tail, Back up, Room</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				           </tr>
				           <tr>
						        <th class="grey">2.Engine Room</th>
						        <th class="bg-danger">NG</th>
						        <th class="bg-warning">C</th>
						        <th class="bg-success">OK</th>
						    </tr>
						    <tr>
						   		<td class="">13) Drive Belts & Hose</td>
						        <td class="bg-danger">
						        	<input type="checkbox" name="ch1">
						        </td>
						        <td class="bg-warning">
						            <input type="checkbox" name="ch2">
						        </td>
						        <td class="bg-success">
						            <input type="checkbox" name="ch3">
						        </td>
						    </tr>
						     <tr>
						        <td class="">14) Air Intake Filter</td>
						        <td class="bg-danger">
						            <input type="checkbox" name="ch1">
						        </td>
						        <td class="bg-warning">
						            <input type="checkbox" name="ch2">
						        </td>
						         <td class="bg-success">
						            <input type="checkbox" name="ch3">
						        </td>
						    </tr>
						    <tr>
						        <td class="">15)Battery Terminal Looseness</td>
						        <td class="bg-danger">
						            <input type="checkbox" name="ch1">
						        </td>
						        <td class="bg-warning">
						            <input type="checkbox" name="ch2">
						        </td>
						        <td class="bg-success">
						            <input type="checkbox" name="ch3">
						        </td>
						    </tr>
						    <tr>
						        <td class="">16) Batter (with tester)</td>
						        <td class="bg-danger">
						            <input type="checkbox" name="ch1">
						        </td>
						        <td class="bg-warning">
						        	<input type="checkbox" name="ch2">
						        </td>
						        <td class="bg-success">
						            <input type="checkbox" name="ch3">
						        </td>
						    </tr> 
						</table>
							<p class="margin"><span><br>Judgement Mark:</span></p>
							<p class="margin">NG = <span class="red"><strong>"NOT GOOD"</strong></span> <br /> C= <span class="orange"><strong>"CAUTION"</strong></span><br /> OK= <span class="green"><strong>"GOOD"</strong> </span></p>
									
					</div>
				</div>
				<div class="col-md-6">
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-center">
							 <tr>
				                    <th class="grey">3) Fluid Level</th>
				                    <th class="bg-danger">NG</th>
				                    <th class="bg-warning">C</th>
				                    <th class="bg-success">OK</th>
				            </tr>
				            <tr>
				            	<td class="">17) Engine Oil </td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">18) Automatic Transmission Oil</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">19) Brake Fluid/ Clutch Fluid (if equipped</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">20) Power Sterring Fluid</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">21) Engine Coolant Fluid in reservoir</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">22) Wind Shield Washer Fluid</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				                <th class="grey">4. Tires Wear condition and Driveshaft Boots</th>
				                <th class="grey"></th>
				                <th class="grey"></th>
				                <th class="grey"></th>
				            </tr>
				            <tr>
				            	<td>23) Tread (mm)</td>
				            	<td class="bg-danger">NG</td>
				                <td class="bg-warning">C</td>
				                <td class="bg-success">OK</td>
				            </tr>
				            <tr>
				            	<td class="">Front(Right)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">Front(Left)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">Rear(Right)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">Rear(Left)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td>24) Abnormal Tire Wear (Tired Surface)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td>24) Abnormal Tire Wear (Sidewall)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				             <tr>
				            	<td>25) Drivershaft Boots</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
						</table>
						<p class="margin"><span><br>Judgement Criteria(TIRES):</span></p>
							<p class="margin">NG = <span class="red"><strong>"1.6mm or less"</strong></span> <br /> C= <span class="orange"><strong>"3 to 5mm"</strong></span><br /> OK= <span class="green"><strong>"Over 5mm"</strong> </span></p>		
					</div>
				</div>
			</div>		
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h6>Addtional Inspection Items(Need to remove some part for inspecting)</h6>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-center">
							 <tr>
							 	<th class="grey">6. Advise to Inspect</th>
							 	<th class="grey"></th>
							 	<th class="grey"></th>
				             </tr>
				             <tr>
				             	<td>If require to replace.</td>
				             	<td>Accept to <br>replace</td>
				             	<td>Contact to <br>confirm</td>
				             </tr>
				             <tr>
				             	<td>26) Air Purifier (for A/C)</td>
				             	<td>
				             		<input type="checkbox" name="ch4">
				             	</td>
				             	<td>
				             		<input type="checkbox" name="ch5">
				             	</td>
				             </tr>
				             <tr>
				             	<td>27) Spark Plug<br>(1pc of Spark Plug is simply checked for judgement)</td>
				             	<td>
				             		<input type="checkbox" name="ch4">
				             	</td>
				             	<td>
				             		<input type="checkbox" name="ch5">
				             	</td>
				             </tr>
						</table>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-center">
							 <tr>
							 	<th class="grey">7. Brake Pad & Lining</th>
							 	<th class="grey"></th>
							 	<th class="grey"></th>
							 	<th class="grey"></th>
				             </tr>
				             <tr>
				            	<td>28)Wear Condition</td>
				            	<td class="bg-danger">NG</td>
				                <td class="bg-warning">C</td>
				                <td class="bg-success">OK</td>
				            </tr>
				            <tr>
				            	<td class="">Front(Right)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">Front(Left)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">Rear(Right)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
				            <tr>
				            	<td class="">Rear(Left)</td>
				            	<td class="bg-danger">
				            		<input type="checkbox" name="ch1">
				            	</td>
				            	<td class="bg-warning">
				            		<input type="checkbox" name="ch2">
				            	</td>
				            	<td class="bg-success">
				            		<input type="checkbox" name="ch3">
				            	</td>
				            </tr>
						</table>
						<p class="margin"><span><br>Judgement Criteria(Brake):</span></p>
							<p class="margin">NG = <span class="red"><strong>"Less than 2 mm (Disc) or Less Than 1 mm (Lining)"</strong></span> <br /> C= <span class="orange"><strong>"2 to 4 mm (DISC) or 1 to 2 (Lining)"</strong></span><br /> OK= <span class="green"><strong>"Over 4mm (Disc) or Over 2 mm(Lining)"</strong> </span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>