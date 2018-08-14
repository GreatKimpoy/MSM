<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inspection extends Model
{
    // 
    protected $table = 'inspections';
	public $primaryKey = 'id';
    public $timestamps = false;




    public function inspection_item()
        {
            return $this->belongsToMany('App\inspection_item', 'inspection_header', 'item_id', 'inspection_id');
        }
        
    
}
