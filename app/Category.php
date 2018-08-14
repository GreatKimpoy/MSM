<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
	public $primaryKey = 'id';
    public $timestamps = false;
    
    public function rules()
    {
        return [
            'name' => "required|min:5|max:30|unique:$this->table,name",
            'description' => 'nullable|min:10|max:50'
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

    public function checkIfCategoryExists()
    {
        return [
            'category' => 'required|exists: ' . $this->table . ',id',
        ];
    }

    public function services()
    {
        return $this->hasMany( __NAMESPACE__ . '\\Service', 'category_id', 'id');
    }
}
