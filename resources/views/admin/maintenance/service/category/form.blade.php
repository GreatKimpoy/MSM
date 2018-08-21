
<style>
    .asterisks{
        color: red;
        font-size: 20px;
    }
</style>





<div class="form-group">
    <label for="name">Name</label><span class="asterisks"><strong>*</strong></span>
    <input 
        class="form-control align-center" 
        placeholder="Name" 
        maxlength="50" 
        required 
        name="name" 
        type="text"
        id="name"
        value="{{ isset($category->name) ? $category->name : old('name') }}">
</div>

<div class="form-group">
    <label for="description">Description</label><span class="asterisks"><strong>*</strong></span>
    <textarea 
        class="form-control align-center" 
        placeholder="Description"
        maxlength="100" 
        name="description"
        cols="50"
        id="description"
        rows="10">{{ isset($category->description) ? $category->description : old('description') }}</textarea>
</div>