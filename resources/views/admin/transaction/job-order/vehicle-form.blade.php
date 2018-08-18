
<style>
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



<div class="row">
    <div class="col-md-6">
            <label for="brand">Brand</label><span class="asterisks"><strong>*</strong></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-car"></i></span>
                    </div>
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
    </div>

    <div class="col-md-6">
        <label for="model">Model</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-car"></i></span>
            </div>
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
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="Year_made" class="labely">Year Made</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
             <input 
                class="form-control align-center" 
                placeholder="Year Made" 
                required 
                name="year_made" 
                type="text"
                id="year_made"
                value="{{ isset($vehicle->year_made) ? $vehicle->year_made : old('year_made') }}">
        </div>
    </div>
    <div class="col-md-4">
        <label for="size" class="labely">Size</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-car"></i></span>
            </div>
            <input 
                class="form-control align-center" size
                placeholder="Size" 
                maxlength="50" 
                required 
                name="size" 
                type="text"
                id="size"
                value="{{ isset($vehicle->size) ? $vehicle->size : old('size') }}">

        </div>    

    </div>

</div>

<div class="row">
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
