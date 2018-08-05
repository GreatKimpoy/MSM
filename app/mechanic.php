<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    protected $table = 'mechanics';
    public $primaryKey = 'MechanicId';
    public $timestamps = false;

    
    public static function rules()
    {
        return [
            'image' => 'image|mimes:jpeg,png,jpg,svg',
            'strFirstName' => 'required|max:45',
            'strMiddleName' => 'nullable|max:45',
            'strLastName' => 'required|max:45',
            'txtStreet' => 'required|max:140',
            'txtBrgy' => 'required|max:140',
            'txtCity' => 'required|max:140',
            'strContact' => 'required|max:30|regex:/^[^_]+$/',
            'strEmail' => 'nullable|email|unique:mechanics|max:100',
            'idSpec' => 'required'
        ];
    }

    public static function messages()
    {
        return [
            'strFirstName.unique' => 'Name is already taken',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'                
        ];
    }

    public static function attributeName()
    {
        
        return [
            'image' => 'Technician Photo',
            'strFirstName' => 'First Name',
            'strMiddleName' => 'Middle Name',
            'strLastName' => 'Last Name',
            'txtStreet' => 'No. & St./Bldg.',
            'txtBrgy' => 'Brgy./Subd.',
            'txtCity' => 'City/Municipality',
            'strContact' => 'Contact No.',
            'strEmail' => 'Email Address',
            'idSpec' => 'Technician Skill(s)'
        ];
    }

}
