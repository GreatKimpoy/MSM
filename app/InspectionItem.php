<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionItem extends Model
{
    //
    protected $table = 'inspection_items';
	public $primaryKey = 'id';
    public $timestamps = false;
}
