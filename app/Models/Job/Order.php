<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'job_orders';
    protected $primaryKey = 'id';
}
