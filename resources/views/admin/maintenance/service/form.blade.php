<div class="form-group">
    <label for="name">Name</label><span>*</span>
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

<div class="form-group">
    <label for="description">Description</label><span>*</span>
    <textarea 
        class="form-control align-center" 
        placeholder="Description"
        maxlength="100" 
        name="description"
        cols="50"
        id="description"
        rows="10">{{ isset($service->description) ? $service->description : old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="category">Category</label><span>*</span>
    <select name="category" class="form-control" required>
    @foreach($categories as $category)
        <option
            value="{{ $category->id }}"
            {{ ( old('category') == $category->id || ( isset( $service->category_id ) && $category->id == $service->category_id ) ) ? 'selected' : "" }}>{{ $category->name }}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
    <label for="warranty">Warranty</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Number of Months Warranty" 
        required 
        name="warranty" 
        type="text"
        id="warranty"
        value="{{ isset($service->warranty) ? $service->warranty : old('warranty') }}">
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
        value="{{ isset($service->price) ? $service->price : old('price') }}">
</div>
