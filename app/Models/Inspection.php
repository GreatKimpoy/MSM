<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inspection extends Model
{
    protected $table = 'inspections';
	public $primaryKey = 'id';
    public $timestamps = false;

    public function item()
    {
        return $this->belongsToMany('App\InspectionItem', 'inspection_header', 'item_id', 'inspection_id');
    }
        
    
}
