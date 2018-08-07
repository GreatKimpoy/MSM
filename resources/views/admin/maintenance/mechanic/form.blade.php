<div class="form-group">
    <label for="lastname">Lastname</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Lastname" 
        maxlength="50" 
        required 
        name="lastname" 
        type="text"
        id="lastname"
        value="{{ isset($mechanic->lastname) ? $mechanic->lastname : old('lastname') }}">
</div>

<div class="form-group">
    <label for="firstname">Firstname</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Firstname" 
        maxlength="50" 
        required 
        name="firstname" 
        type="text"
        id="firstname"
        value="{{ isset($mechanic->firstname) ? $mechanic->firstname : old('firstname') }}">
</div>

<div class="form-group">
    <label for="middlename">Middlename</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Middlename" 
        maxlength="50" 
        required 
        name="middlename" 
        type="text"
        id="middlename"
        value="{{ isset($mechanic->middlename) ? $mechanic->middlename : old('middlename') }}">
</div>

<div class="form-group">
    <label for="street">Street</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Street" 
        maxlength="50" 
        required 
        name="street" 
        type="text"
        id="street"
        value="{{ isset($mechanic->street) ? $mechanic->street : old('street') }}">
</div>

<div class="form-group">
    <label for="barangay">Barangay</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Barangay" 
        maxlength="50" 
        required 
        name="barangay" 
        type="text"
        id="barangay"
        value="{{ isset($mechanic->barangay) ? $mechanic->barangay : old('barangay') }}">
</div>

<div class="form-group">
    <label for="city">City</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="City" 
        maxlength="50" 
        required 
        name="city" 
        type="text"
        id="city"
        value="{{ isset($mechanic->city) ? $mechanic->city : old('city') }}">
</div>

<div class="form-group">
    <label for="birthdate">Birthdate</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Birthdate" 
        maxlength="50" 
        required 
        name="birthdate" 
        type="date"
        id="birthdate"
        value="{{ isset($mechanic->birthdate) ? $mechanic->birthdate : old('birthdate') }}">
</div>

<div class="form-group">
    <label for="contact">Contact Number</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Contact Number" 
        maxlength="50" 
        required 
        name="contact" 
        type="text"
        id="contact"
        value="{{ isset($mechanic->contact) ? $mechanic->contact : old('contact') }}">
</div>

<div class="form-group">
    <label for="specializations">Specialization</label><span>*</span>
    <select 
        name="specializations[]" 
        class="form-control"
        multiple>
        @foreach($categories as $category)
        <option
            value="{{ $category->id }}"
            @if( old('specializations') )
                @if( in_array( $category->id, old('specializations') ) )
                selected
                @endif    
            @elseif(
                isset( $mechanic->specializations_id ) && 
                count( $mechanic->specializations_id ) > 0 && 
                in_array( $category->id, $mechanic->specializations_id ) )
                selected
            @endif
            >
            {{ $category->name }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="email">Email Address</label><span>*</span>
    <input 
        class="form-control align-center" 
        placeholder="Email Address" 
        maxlength="50" 
        required 
        name="email" 
        type="email"
        id="email"
        value="{{ isset($mechanic->email) ? $mechanic->email : old('email') }}">
</div>