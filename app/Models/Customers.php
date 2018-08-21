<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
    
{
    protected $table = 'customers';
	public $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'lastName',
        'firstName',
        'middleName',
        'barangay',
        'contact',
        'city',
        'street',
        'birthdate',
        'email',
    ];
   

}
