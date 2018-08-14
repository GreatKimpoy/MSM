<?php

namespace App\Models\Inspection;

use Illuminate\Database\Eloquent\Model;

class InspectionItem extends Model
{
    //
    protected $table = 'inspection_items';
	public $primaryKey = 'id';
    public $timestamps = false;
}
