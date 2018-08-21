<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
	public $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'barangay',
        'contact',
        'city',
        'street',
        'birthdate',
        'email',
    ];
   

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
        ];
    }

    public function checkIfCustomerExists()
    {
        return [
            'customer' => "required|exists:$this->table,id"
        ];
    }

    protected $appends = [
        'full_name', 'full_address'
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


    public function getVehiclesIdAttribute()
    {
        $vehicles = $this->vehicles->pluck('id');
        if( count($vehicles->toArray() ) > 0 ) {
            return $vehicles->toArray();
        }
    }

    public function vehicles()
    {
        return $this->hasMany( __NAMESPACE__ . '\\Vehicle', 'owner_id', 'id');
    }

    public function addCustomer($request)
    {
        $lastname = filter_var($request->get('lastname'), FILTER_SANITIZE_STRING);
        $firstname = filter_var($request->get('firstname'), FILTER_SANITIZE_STRING);
        $middlename = filter_var($request->get('middlename'), FILTER_SANITIZE_STRING);
        $street = filter_var($request->get('street'), FILTER_SANITIZE_STRING);
        $barangay = filter_var($request->get('barangay'), FILTER_SANITIZE_STRING);
        $city = filter_var($request->get('city'), FILTER_SANITIZE_STRING);
        $birthdate = filter_var($request->get('birthdate'), FILTER_SANITIZE_STRING);
        $contact = filter_var($request->get('contact'), FILTER_SANITIZE_STRING);
        $email = filter_var($request->get('email'), FILTER_SANITIZE_STRING);


        $customer = new Person;
        $customer->lastname = $lastname;
        $customer->firstname = $firstname;
        $customer->middlename = $middlename;
        $customer->barangay = $barangay;
        $customer->city = $city;
        $customer->street = $street;
        $customer->birthdate = $birthdate;
        $customer->contact = $contact;
        $customer->email = $email;
        $customer->save();
    }
}

