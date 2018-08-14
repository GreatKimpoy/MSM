
<style>
    .asterisks{
        color: red;
    }
    #forms {
        margin-bottom: 20px;
    }
</style>




<div class="row">
    <div class="col-md-4">
        <label for="Part Number">Part Number</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-wrench"></i></span>
            </div>
            <input 
                class="form-control align-center" 
                placeholder="Part Number" 
                maxlength="50" 
                required 
                name="part_number" 
                type="text"
                id="part_number"
                value="{{ isset($part->part_number) ? $part->part_number : old('part_number') }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="model">Model</label><span class="asterisks"><strong>*</strong></span>
            <select name="model" class="form-control" required>
            @foreach($vehicles as $vehicle)
                <option
                    value="{{ $vehicle->id }}"
                    {{ ( old('vehicle') == $vehicle->id || ( isset( $part->vehicle_id ) && $vehicle->id == $part->vehicle_id ) ) ? 'selected' : "" }}>{{ $vehicle->model }}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <label for="location">Location</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-wrench"></i></span>
            </div>
            <input 
                class="form-control align-center" 
                placeholder="Part Location" 
                maxlength="50" 
                required 
                name="part_location" 
                type="text"
                id="part_location"
                value="{{ isset($part->part_location) ? $part->part_location : old('part_location') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <label for="description">Description</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-wrench"></i></span>
            </div>
             <input 
                class="form-control align-center" 
                placeholder="Description" 
                required 
                name="description" 
                type="text"
                id="description"
                value="{{ isset($part->description) ? $part->description : old('description') }}">
        </div>
    </div>
    <div class="col-md-4">
        <label for="price">Price</label><span class="asterisks"><strong>*</strong></span>
         <div class="input-group" id="forms">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-money"></i></span>
            </div>
            <input 
                class="form-control align-center" 
                placeholder="Price" 
                maxlength="50" 
                required 
                name="price" 
                type="text"
                id="price"
                value="{{ isset($part->price) ? $part->price : old('price') }}">
        </div>
    </div>
</div>
