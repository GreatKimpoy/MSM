<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicianSkill extends Model
{
    //
    protected $table = 'category_persons';
    //Primary Key
	public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;

    public function technician(){
        return $this->belongsTo('App\Models\Technicians','technician_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
