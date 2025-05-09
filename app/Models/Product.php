<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'des'];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
