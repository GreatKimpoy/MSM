

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
    <div class="col-md-4">
        <label for="lastname">Lastname</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
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
    </div>

    <div class="col-md-4">
        <label for="firstname">Firstname</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
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
    </div>

    <div class="col-md-4">
        <label for="firstname">Middlename</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
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
    </div>
</div>


<div class="row">
    <div class="col-md-4">
       <label for="street" class="labely">Street</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book"></i></span>
            </div>
              <input 
                class="form-control align-center" 
                placeholder="Street" 
                maxlength="50" 
                required 
                name="street" 
                type="text"
                id="street"
                value="{{ isset($mechanic->barangay) ? $mechanic->barangay : old('barangay') }}">

        </div>
    </div>

    <div class="col-md-4">
        <label for="street" class="labely">Barangay</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book"></i></span>
            </div>
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
    </div>

    <div class="col-md-4">
        <label for="city" class="labely">City</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book"></i></span>
            </div>
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
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="birthdate" class="labely">Birthdate</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
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
    </div>

    <div class="col-md-4">
        <label for="contact" class="labely">Contact Number</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i></span>
            </div>
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
    </div>

    <div class="col-md-4">
        <label for="email" class="labely">Email Address</label><span class="asterisks"><strong>*</strong></span>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-at"></i></span>
            </div>
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
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="specializations" class="labely">Specialization</label><span class="asterisks"><strong>*</strong></span>
            <select 
                name="specializations[]" 
                class="form-control select2"
                id="form" 
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
    </div>
</div>