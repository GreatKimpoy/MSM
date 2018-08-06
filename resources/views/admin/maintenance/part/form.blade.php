<div class="form-group">
    <label for="Part Number">Part Number</label><span>*</span>
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

<div class="form-group">
    <label for="model">Model</label><span>*</span>
    <select name="model" class="form-control" required>
    @foreach($vehicles as $vehicle)
        <option
            value="{{ $vehicle->id }}"
            {{ ( old('vehicle') == $vehicle->id || ( isset( $part->vehicle_id ) && $vehicle->id == $part->vehicle_id ) ) ? 'selected' : "" }}>{{ $vehicle->model }}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
    <label for="location">Location</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Part Location" 
        maxlength="50" 
        required 
        name="part_loecation" 
        type="text"
        id="part_location"
        value="{{ isset($part->part_location) ? $part->part_location : old('part_location') }}">
</div>

<div class="form-group">
    <label for="description">Description</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Description" 
        required 
        name="description" 
        type="text"
        id="description"
        value="{{ isset($part->description) ? $part->description : old('description') }}">
</div>

<div class="form-group">
    <label for="price">Price</label><span>*</span>
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


