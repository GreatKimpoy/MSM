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
        $name = $this->name;
        return [
            'name' => "required|min:5|max:30|unique:categories,name,$name,name",
            'description' => 'nullable|min:10|max:50',
            'category' => "required|exists:$this->table,id"
        ];
    }

    public function checkIfCategoryExists()
    {
        return [
            'category' => "required|exists:$this->table,id"
        ];
    }
}
