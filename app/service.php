<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
     protected $table = 'services';
    //Primary Key
	public $primaryKey = 'ServiceId';
    // Timestamps
	public $timestamps = false;
}
