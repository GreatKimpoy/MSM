

<style>

    .asterisks{
        color: red;
         font-size: 20px;
    }

    .labely{
        margin-top: 20px;
        padding-left: 10px;
    }

    .label{
        margin-top: 25px;
        padding-left: 10px;
    }

    #forms{
        margin-bottom: 20px;
        margin-left: 10px;
    }

    #form{
        padding-left: 10px;
    }

</style>    




<div class="row">

    <div class="col-md-6">
        <label for="brand" class="labely">Brand</label><span class="asterisks"><strong>*</strong></span>
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

     <div class="col-md-6">
        <label for="model" class="labely">Model</label><span class="asterisks"><strong>*</strong></span>
             <input 
                class="form-control align-center" 
                placeholder="Model & Year" 
                maxlength="50" 
                required 
                name="model" 
                type="text"
                id="model"
                value="{{ isset($category->model) ? $category->model : old('model') }}">
    </div>
</div>


<div class="row">


    <div class="col-md-6">
        <label for="size" class="label">Size</label><span class="asterisks"><strong>*</strong></span>
        <div id="forms">
            <input 
                class="form-control align-center"
                placeholder="Size" 
                maxlength="50" 
                required 
                name="size" 
                type="text"
                id="size"
                value="{{ isset($category->size) ? $category->size : old('size') }}">
        </div>
    </div>

    <div class="col-md-6">
        <label for="transmission" class="label">Transmission Type</label><span class="asterisks"><strong>*</strong></span>
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