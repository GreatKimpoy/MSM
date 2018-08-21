<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionTechnician extends Model
{
	//
    protected $table = 'inspection_technicians';
    //Primary Key
	public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
    
      protected $fillable = [
    	'inspection_id',
        'technician_id',
    
    ];
 

    public function inspection(){
        return $this->belongsTo('App\Models\Inspection','inspection_id');
    }
    
    public function technician(){
        return $this->belongsTo('App\Models\Technician','technician_id');
    }

}


