
<style>

    .asterisks{
        color: red;
    }
    #forms {
        margin-bottom: 20px;
    }

    .labely{
        margin-top: 40px;
    }

    .label{
        margin-top: 15px;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <label for="Part Number" class="labely">Part Number</label><span class="asterisks"><strong>*</strong></span>
            <input 
                class="form-control align-center" 
                placeholder="Part Number" 
                maxlength="50" 
                required 
                name="number" 
                type="text"
                id="number"
                value="{{ isset($part->number) ? $part->number : old('number') }}">
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="model" class="labely">Model</label><span class="asterisks"><strong>*</strong></span>
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
        <label for="location" class="labely">Location</label><span class="asterisks"><strong>*</strong></span>
            <select name="location" class="form-control" required>
            @foreach($locations as $location)
                <option
                    value="{{ $location }}"
                    {{ ( old('location') == $location || ( isset( $part->location ) && $location == $part->location ) ) ? 'selected' : "" }}>{{ $location }}</option>
            @endforeach
            </select>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <label for="description" class="label">Description</label><span class="asterisks"><strong>*</strong></span>
             <input 
                class="form-control align-center" 
                placeholder="Description" 
                required 
                name="description" 
                type="text"
                id="description"
                value="{{ isset($part->description) ? $part->description : old('description') }}">
    </div>
    <div class="col-md-4">
        <label for="price" class="label">Price</label><span class="asterisks"><strong>*</strong></span>
         <div id="forms">
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
