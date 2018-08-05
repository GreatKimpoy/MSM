<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'service_categories';
    //Primary Key
	public $primaryKey = 'CategoryId';
    // Timestamps
	public $timestamps = false;
}
