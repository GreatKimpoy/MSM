<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	//
    protected $table = 'vehicles';
    //Primary Key
	public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
    
    public function rules()
    {
        return [
            'brand' => "required|min:5|max:30",
            'model' => "required|min:3|max:50",
            'year_made' => "required",
            'size' => "required",
            'transmission' => "required",
           
        ];
    }
    
    public function updateRules()
    {
        $brand = $this->brand;
        return [
            'brand' => 'required|min:5|max:30',
            'model' => 'nullable|min:3|max:50',
            'year_made' => 'required',
            'size' => 'required',
            'transmission' => 'required',
        ];
    }

    
    public function checkIfVehicleExists()
    {
        return [
            'vehicle' => "required|exists:$this->table,id"
        ];
    }


}


