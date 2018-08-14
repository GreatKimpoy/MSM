<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'vehicle_parts';
	public $primaryKey = 'id';
    public $timestamps = false;

    public static $locations = [
        'Engine', 'Chassis', 'Electrical', 'Aircon'
    ];   
    
    public function rules()
    {
        return [
            'number' => "required|min:5|max:30|unique:$this->table,number",
            'model' => 'required|exists:vehicle_categories,id',
            'location' => 'required',
            'description' => 'required',
            'price' => 'required'
        ];
    }
    
    public function updateRules()
    {
        return [
            'number' => 'required|min:5|max:30|unique:' . $this->table . ',number,' . $this->number . ',number',
            'model' => 'required|exists:vehicle_categories,id',
            'location' => 'required',
            'description' => 'required',
            'price' => 'required',
            'part' => "required|exists:$this->table,id",
        ];
    }

    public function category()
    {
        return $this->belongsTo( __NAMESPACE__ . '\\Category', 'vehicle_id', 'id');
    }

    public function checkIfPartExists()
    {
        return [
            'part' => "required|exists:$this->table,id"
        ];
    }
}
