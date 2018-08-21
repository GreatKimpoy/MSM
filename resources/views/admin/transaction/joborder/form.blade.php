





<div class="row">

	<div class="col-md-6">
		 <div class="form-group">
            <label for="model" class="labely">Technician(s) Assigned</label><span class="asterisks"><strong>*</strong></span>
            	<select name="technician" class="form-control select2" multiple="multiple" style="width: 100%;">

            	</select>
        </div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="plate" class="labely">Vehicle Plate Number</label>
			<input type="text" name="plate" class="form-control" placeholder="Plate Number" id="plate">
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="model" class="labely">Vehicle Model</label>
			<input type="text" name="model" class="form-control" placeholder="Model">
		</div>
	</div>


</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="milleage" class="labely"> Milleage</label>
				<input type="text" name="milleage" class="form-control" placeholder="Milleage">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="parts" class="labely">Item Part Search</label>
			<select name="part" class="form-control select2" multiple="multiple" style="width: 100%;">

            </select>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="service" class="labely">Service Search</label>
			<select name="service" class="form-control select2" multiple="multiple" style="width: 100%;">

            </select>
		</div>
	</div>

</div>


<div class="row">
	<div class="col-md-12">
        <table id="job" class="table table-striped table-bordered responsive">
            <thead>
                <tr>
                    <th>Parts</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Cost</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                                   
                                  
                                   
            </tbody>
        </table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
		<label for="remarks" id="labely" class="pt-3">Remarks<span class="asterisks">*</span></label>
		<input type="textarea" name="remarks" class="form-control" maxlength="500">
		</div>
	</div>
</div>