<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
	//
    protected $table = 'vehicle_types';
    //Primary Key
	public $primaryKey = 'VehicleId';
    // Timestamps
	public $timestamps = false;
}
