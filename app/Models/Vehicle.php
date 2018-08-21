<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	//
    protected $table = 'vehicles';
    //Primary Key
	public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
    
     public $fillable = [
        'plate_number',
        'vehicle_id'
       
    ];

    public function model(){
        return $this->belongsTo('App\Models\Vehicle\Category','vehicle_id');
    }
}


