<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
	public $primaryKey = 'id';
    public $timestamps = false;

    public function rules()
    {
        return [
            'name' => "required|min:5|max:30|unique:$this->table,name",
            'description' => 'nullable|min:10|max:50',
            'warranty' => 'required',
            'category' => 'required|exists:categories,id',
            'price' => 'required'
        ];
    }
    
    public function updateRules()
    {
        $name = $this->name;
        return [
            'name' => "required|min:5|max:30|unique:$this->table,name,$name,name",
            'description' => 'nullable|min:10|max:50',
            'warranty' => 'required',
            'category' => 'required|exists:categories,id',
            'price' => 'required',
            'service' => "required|exists:$this->table,id",
            'category' => "required|exists:categories,id"
        ];
    }

    public function checkIfServiceExists()
    {
        return [
            'service' => "required|exists:$this->table,id"
        ];
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
