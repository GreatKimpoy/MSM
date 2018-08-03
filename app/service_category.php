<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_category extends Model
{
    //
    protected $table = 'service_categories';
    //Primary Key
	public $primaryKey = 'CategoryId';
    // Timestamps
	public $timestamps = false;
}
