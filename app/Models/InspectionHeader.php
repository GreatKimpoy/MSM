<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionHeader extends Model
{
	//
    protected $table = 'inspection_header';
    //Primary Key
	public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
    
    protected $fillable = [
        'inspection_id',
        'item_id',
        'remarks',
    	
    ];

    public function inspection(){
        return $this->belongsTo('App\Models\Inspection','inspection_id');
    }

    
    public function item(){
        return $this->belongsTo('App\Models\InspectionItem','item_id');
    }


}