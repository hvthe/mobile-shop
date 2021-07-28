<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;

    public function products() 
    {
       return $this->hasMany('App\Category', 'cat_id');
    }
    
    
}
