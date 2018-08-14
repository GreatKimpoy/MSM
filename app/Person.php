<?php

namespace App;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
	public $primaryKey = 'id';
    public $timestamps = false;
    
    public function rules()
    {
        return [
            'name' => "required|min:5|max:30|unique:$this->table,name",
            'description' => 'nullable|min:10|max:50'
        ];
    }
    
    public function updateRules()
    {
        return [
            'name' => 'required|min:5|max:30|unique:' . $this->table . ',name,' . $this->name . ',name',
            'description' => 'nullable|min:10|max:50',
            'category' => "required|exists:categories,id"
        ];
    }

    public function mechanicRules() 
    {
        return [
            'lastname' => 'required|min:2|max:60|string',
            'middlename' => 'nullable|min:2|max:60|string',
            'firstname' => 'required|min:2|max:60|string',
            'street' => 'required|min:2|max:60',
            'barangay' => 'required|min:2|max:60',
            'city' => 'required|min:2|max:60',
            'birthdate' => 'required|date',
            'contact' => 'required|min:2|max:60',
            'email' => 'required|email',
            'type' => [
                'required',
                Rule::in(['mechanic']),
            ],
        ];
    }

    public function mechanicUpdateRules() 
    {
        return [
            'lastname' => 'required|min:2|max:60|string',
            'middlename' => 'min:2|max:60|string',
            'firstname' => 'required|min:2|max:60|string',
            'street' => 'required|min:2|max:60',
            'barangay' => 'required|min:2|max:60',
            'city' => 'required|min:2|max:60',
            'birthdate' => 'required|date',
            'contact' => 'required|min:2|max:60',
            'email' => 'required|email',
            'type' => [
                'required',
                Rule::in(['mechanic']),
            ],
            'mechanic' => "required|exists:$this->table,id"
        ];
    }

    public function checkIfPersonExists()
    {
        return [
            'person' => "required|exists:$this->table,id"
        ];
    }

    public function scopeMechanic( $query )
    {
        return $query->where('type', '=', 'mechanic');
    }

    public function scopeCustomer( $query )
    {
        return $query->where('type', '=', 'customer');
    }

    protected $appends = [
        'full_name', 'full_address', 'specializations', 'specializations_id'
    ];

    public function getFullNameAttribute()
    {
        $lastname = $this->lastname;
        $firstname = $this->firstname;
        $middlename = $this->middlename;
        return trim("$lastname, $firstname $middlename");
    }

    public function getFullAddressAttribute()
    {
        $street = $this->street;
        $barangay = $this->barangay;
        $city = $this->city;
        return trim("$street $barangay $city");
    }

    public function getSpecializationsAttribute()
    {
        $categories = $this->categories->pluck('name');
        if( count($categories->toArray() ) > 0 ) {
            return implode(', ', $categories->toArray());
        } else {
            return 'None';
        }
    }

    public function getSpecializationsIdAttribute()
    {
        $categories = $this->categories->pluck('id');
        if( count($categories->toArray() ) > 0 ) {
            return $categories->toArray();
        }
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_person', 'person_id', 'category_id');
    }


    //CUSTOMERS

    public function customerRules() 
    {
        return [
            'lastname' => 'required|min:2|max:60|string',
            'middlename' => 'nullable|min:2|max:60|string',
            'firstname' => 'required|min:2|max:60|string',
            'street' => 'required|min:2|max:60',
            'barangay' => 'required|min:2|max:60',
            'city' => 'required|min:2|max:60',
            'birthdate' => 'required|date',
            'contact' => 'required|min:2|max:60',
            'email' => 'required|email',
            'type' => [
                'required',
                Rule::in(['customer']),
            ],
        ];
    }

    public function customerUpdateRules() 
    {
        return [
            'lastname' => 'required|min:2|max:60|string',
            'middlename' => 'min:2|max:60|string',
            'firstname' => 'required|min:2|max:60|string',
            'street' => 'required|min:2|max:60',
            'barangay' => 'required|min:2|max:60',
            'city' => 'required|min:2|max:60',
            'birthdate' => 'required|date',
            'contact' => 'required|min:2|max:60',
            'email' => 'required|email',
            'type' => [
                'required',
                Rule::in(['customer']),
            ],
            'customer' => "required|exists:$this->table,id"
        ];
    }

    public function scopeCustomer( $query )
    {
        return $query->where('type', '=', 'customer');
    }

    public function getVehiclesIdAttribute()
    {
        $vehicles = $this->vehicles->pluck('id');
        if( count($vehicles->toArray() ) > 0 ) {
            return $vehicles->toArray();
        }
    }

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle', 'vehicle_person', 'person_id', 'vehicle_id');
    }

}

