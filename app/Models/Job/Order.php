<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'job_orders';
    protected $primaryKey = 'id';
    public $timestamps = 'true';

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

    public function checkIfPersonExists()
    {
        return [
            'person' => "required|exists:$this->table,id"
        ];
    }

    public function persons()
    {
        return $this->belongsTo( __NAMESPACE__ . '\\Customer', 'person', 'customer_id', 'id');
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
        $type = filter_var($request->get('type'), FILTER_SANITIZE_STRING);

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
        $customer->type = $type;
        $customer->save();
    }



}
