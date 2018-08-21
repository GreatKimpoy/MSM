<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionType extends Model
{
	//
    protected $table = 'inspection_types';
    //Primary Key
	public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
    protected $fillable = [
    	'type' 	
    ];
    
    public function item()
    {
        return $this->hasMany( __NAMESPACE__ . '\\InspectionItem', 'type_id', 'id');
    }
}


