<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Description;
class Product extends Model
{
    protected $fillable = ['name', 'slug', 'img', 'price', 'sku', 'category_id', 'description_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function description()
    {
        return $this->belongsTo(Description::class, 'description_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
