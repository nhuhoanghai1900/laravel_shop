<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Description extends Model
{
    protected $fillable = ['content'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
