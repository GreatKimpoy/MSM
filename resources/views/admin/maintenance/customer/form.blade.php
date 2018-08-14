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
        value="{{ isset($customer->lastname) ? $customer->lastname : old('lastname') }}">
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
        value="{{ isset($customer->firstname) ? $customer->firstname : old('firstname') }}">
</div>

<div class="form-group">
    <label for="middlename">Middlename</label><span></span>
    <input 
        class="form-control align-center" 
        placeholder="Middlename" 
        maxlength="50" 
        name="middlename" 
        type="text"
        id="middlename"
        value="{{ isset($customer->middlename) ? $customer->middlename : old('middlename') }}">
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
        value="{{ isset($customer->street) ? $customer->street : old('street') }}">
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
        value="{{ isset($customer->barangay) ? $customer->barangay : old('barangay') }}">
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
        value="{{ isset($customer->city) ? $customer->city : old('city') }}">
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
        value="{{ isset($customer->birthdate) ? $customer->birthdate : old('birthdate') }}">
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
        value="{{ isset($customer->contact) ? $customer->contact : old('contact') }}">
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
        value="{{ isset($customer->email) ? $customer->email : old('email') }}">
</div>