


<<<<<<< HEAD
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
=======





<div class="row">

    <div class="col-md-6">
         <div class="form-group">
            <label for="model" class="labely">Technician(s) Assigned</label><span class="asterisks"><strong>*</strong></span>
                <select name="technician[]" class="form-control select2" multiple="multiple" style="width: 100%;">


                @foreach($technicians as $technician)
                    <option value="{{$technician->id}}">{{$technician->firstname}} {{$technician->middlename}} {{$technician->lastname}}</option>
                @endforeach
         
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
             <select name="modelId"  class="form-control select2" style="width: 100%;">
                
                 @foreach($autos as $model)
                <option value="{{$model->id}}">{{$model->brand}} - {{$model->model}} </option>
                  @endforeach
                </select>
        </div>
    </div>

>>>>>>> 1.0

	<div class="col-md-6">
		<div class="form-group">
			<label for="technician"><strong>Technician Assigned</strong><span class="asterisks">*</span></label>
				<select name="technician" class="form-control select2">
						<option>
										
						</option>
				</select>
		</div>
	</div>

<<<<<<< HEAD

</div>

=======
@include('admin.transaction.inspection.formCreate')
>>>>>>> 1.0
