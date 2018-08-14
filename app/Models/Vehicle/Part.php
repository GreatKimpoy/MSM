<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'vehicle_parts';
	public $primaryKey = 'id';
    public $timestamps = false;

    public static $locations = [
        'Engine', 'Chassis', 'Electrical', 'Aircon'
    ];
}
