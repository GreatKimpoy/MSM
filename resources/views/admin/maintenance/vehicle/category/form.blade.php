
    <div class="form-group">
        <div class="col-md-12">
            <label for="brand">Brand</label>
            <input 
                class="form-control align-center" 
                placeholder="Brand" 
                maxlength="50" 
                required 
                name="brand" 
                type="text"
                id="brand"
                value="{{ isset($category->brand) ? $category->brand : old('brand') }}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <label for="model">Model</label>
            <input 
                class="form-control align-center" 
                placeholder="Model" 
                maxlength="50" 
                required 
                name="model" 
                type="text"
                id="model"
                value="{{ isset($category->model) ? $category->model : old('model') }}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <label for="Year_made" class="labely">Year Made</label>
            <input 
                class="form-control align-center" 
                placeholder="Year Made" 
                required 
                name="year_made" 
                type="text"
                id="year_made"
                value="{{ isset($category->year_made) ? $category->year_made : old('year_made') }}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <label for="size" class="labely">Size</label>
            <input 
                class="form-control align-center" size
                placeholder="Size" 
                maxlength="50" 
                required 
                name="size" 
                type="text"
                id="size"
                value="{{ isset($category->size) ? $category->size : old('size') }}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <label for="transmission" class="labely">Transmission Type</label>
        </div>
        <div class="col-md-12">
        @if(isset($transmission_types))
            @foreach($transmission_types as $key => $type)
            <input 
                required 
                name="transmission" 
                type="radio"
                @if( isset($category->transmission_type) && $category->transmission_type == $type )
                checked
                @elseif( $type == old('transmission') )
                checked
                @elseif( !isset($category->transmission) && $key == 0 )
                checked
                @endif
                value="{{ $type }}"> {{ $type }}      
            @endforeach
        @endif
        </div>
    </div>
