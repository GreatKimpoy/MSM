<?php

namespace App;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointments';
	public $primaryKey = 'id';
    public $timestamps = false;


     public function rules()
    {
        return [
            'appointment_name' => "required|min:5|max:30|unique:$this->table,appointment_name",
            'appointment_start' => 'required|date|After:Yesterday',
          	'appointment_end' => 'required'
              
        ];
    }

    public function customerRules(){
        return[
            'lastname' => 'required|max:30|string',
            'firstname' => 'required|max:30|string',
            'middlename' => 'required|max:30',
            'contact' => 'required|min:2|max:60',
            'email' => 'required|email'
        ];
    }
    
    public function checkIfAppointmentExists()
    {
        return [
            'appointments' => "required|exists:$this->table,id"
        ];
    }

}
