<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inspection extends Model
{
    protected $table = 'inspections';
	public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
    	'customer_id',
        'vehicle_id',
        'additional_remarks'
        
    ];



    public function inspection(){
        return $this->hasMany('App\Models\InspectionHeader','inspection_id');
    }
    
    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle\Category','vehicle_id');
    }
    
    public function technician(){
        return $this->hasMany('App\InspectionTechnician','inspectionId')->where('isActive',1);
    }
}
