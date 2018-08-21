







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


</div>

@include('admin.transaction.inspection.formCreate')
