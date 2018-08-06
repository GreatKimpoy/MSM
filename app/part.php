<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';
	public $primaryKey = 'id';
    public $timestamps = false;

    public function rules()
    {
        return [
            'part_number' => "required|min:5|max:30|unique:$this->table,part_number",
            'model' => 'required|exists:vehicles,id',
            'part_location' => 'required',
            'description' => 'required',
            'price' => 'required'
        ];
    }
    
    public function updateRules()
    {
        $part_number = $this->part_number;
        return [
            'part_number' => "required|min:5|max:30|unique:$this->table,part_number,$part_number,part_number",
            'model' => 'required|exists:vehicles,id',
            'part_location' => 'required',
            'description' => 'required',
            'price' => 'required',
            'part' => "required|exists:$this->table,id",
            'model' => "required|exists:vehicles,id"
           
            
            
           
        ];
    }

    public function checkIfPartsExists()
    {
        return [
            'part' => "required|exists:$this->table,id"
        ];
    }
    
    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }
}
