<div class="form-group">
    <label for="brand">Brand</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Brand" 
        maxlength="50" 
        required 
        name="brand" 
        type="text"
        id="brand"
        value="{{ isset($vehicle->brand) ? $vehicle->brand : old('brand') }}">
</div>

<div class="form-group">
    <label for="model">Model</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Model" 
        maxlength="50" 
        required 
        name="model" 
        type="text"
        id="model"
        value="{{ isset($vehicle->model) ? $vehicle->model : old('model') }}">
</div>

<div class="form-group">
    <label for="Year_made">Year Made</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Year Made" 
        required 
        name="year_made" 
        type="text"
        id="year_made"
        value="{{ isset($vehicle->year_made) ? $vehicle->year_made : old('year_made') }}">
</div>

<div class="form-group">
    <label for="size">Size</label><span>*</span>
    <input 
        class="form-control align-center" size
        placeholder="Size" 
        maxlength="50" 
        required 
        name="size" 
        type="text"
        id="size"
        value="{{ isset($vehicle->size) ? $vehicle->size : old('size') }}">
</div


<div>

<label for="transmission">transmission</label><span>*</span>
    <input 
        class="form-control align-center" size
        placeholder="Transmission" 
        maxlength="50" 
        required 
        name="transmission" 
        type="text"
        id="transmission"
        value="{{ isset($vehicle->transmission) ? $vehicle->transmission : old('transmission') }}">
        <br>
</div>



<!--  <div class = "form-group">
   
   <label for"trasmission">Transmission</label><span>*</span>
   <form action="">
   
   <input type="radio" 
   name="transmission" 
   value=
   {{ ( ( isset($vehicle->transmission) && $vehicle->transmission == 'Manual' ) || old('transmission') == 'Manual' )  ? 'checked' : '' }}> manual
   
   <input type="radio" 
   name="transmission" 
   value=
   {{ ( ( isset($vehicle->transmission) && $vehicle->transmission == 'automatic' ) || old('transmission') == 'automatic' )  ? 'checked' : '' }}>automatic<br>

   </form>
</div>
-->
