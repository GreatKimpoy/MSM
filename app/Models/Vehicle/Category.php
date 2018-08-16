<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'vehicle_categories';
	public $primaryKey = 'id';
    public $timestamps = false;
    public static $transmission_types = [
        'Automatic', 'Manual', 'Both'
    ];
    
    public function rules()
    {
        return [
            'brand' => "required|min:1|max:30",
            'model' => "required|min:3|max:50",
            'year_made' => "required",
            'size' => "required",
            'transmission' => "required",
           
        ];
    }
    
    public function updateRules()
    {
        $brand = $this->brand;
        return [
            'brand' => 'required|min:1|max:30',
            'model' => 'nullable|min:3|max:50',
            'year_made' => 'required',
            'size' => 'required',
            'transmission' => 'required',
        ];
    }

    
    public function checkIfCategoryExists()
    {
        return [
            'category' => "required|exists:$this->table,id"
        ];
    }

}


