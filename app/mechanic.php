<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mechanic extends Model
{
    protected $table = 'mechanics';

    public $primaryKey = 'MechanicId';

    public $timestamps = false;
}
