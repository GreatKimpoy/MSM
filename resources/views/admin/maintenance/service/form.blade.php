<style>
    .asterisks{
        color: red;
        font-size: 20px;
    }
    .labely{
        margin-top: 10px;
    }
    #form{
        margin-bottom: 20px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <label for="name">Name</label><span class="asterisks"><strong>*</strong></span>
            <input 
                class="form-control align-center" 
                placeholder="Name" 
                maxlength="50" 
                required 
                name="name" 
                type="text"
                id="name"
                value="{{ isset($service->name) ? $service->name : old('name') }}">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="description" class="labely">Description</label><span>*</span>
            <textarea 
                class="form-control align-center" 
                placeholder="Description"
                maxlength="100" 
                name="description"
                cols="50"
                id="description"
                rows="10">{{ isset($service->description) ? $service->description : old('description') }}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="category">Category</label><span class="asterisks"><strong>*</strong></span>
            <select name="category" class="form-control" required>
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ ( old('category') == $category->id || ( isset( $service->category_id ) && $category->id == $service->category_id ) ) ? 'selected' : "" }}>{{ $category->name }}</option>
            @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <label for="warranty">Warranty</label><span class="asterisks"><strong>*</strong></span>
             <input 
                class="form-control align-center" 
                placeholder="Number of Months Warranty" 
                maxlength="10" 
                required 
                name="warranty" 
                type="text"
                id="warranty"
                value="{{ isset($service->warranty) ? $service->warranty : old('warranty') }}">
    </div>

    <div class="col-lg-6">
        <label for="price">Price</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group" id="form">
                <input 
                    class="form-control align-center" 
                    placeholder="Price" 
                    maxlength="50" 
                    required 
                    name="price" 
                    type="text"
                    id="price"
                    value="{{ isset($service->price) ? $service->price : old('price') }}">
        </div>
    </div>
</div>
