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
            'description' => 'nullable|min:10|max:50',
            'price' => 'nullable|min:10|max:50',
            'model' => 'nullable|min:10|max:50',
            'location' => 'nullable|min:10|max:50',
        ];
    }
    
    public function updateRules()
    {
        return [
            'name' => 'required|min:5|max:30|unique:' . $this->table . ',name,' . $this->name . ',name',
            'description' => 'nullable|min:10|max:50',
            'category' => 'required|exists:' . $this->table . ',id',
        ];
    }
}
