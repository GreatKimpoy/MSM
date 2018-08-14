<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionType extends Model
{
    protected $table = 'inspection_types';
    //Primary Key
	public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;

}
