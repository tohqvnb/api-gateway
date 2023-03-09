<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';

    protected $fillable = [
        'category_id', 'product_id'
    ];

//    public function products()
//    {
//        return $this->belongsTo(Product::class);
//    }
//
//    public function categories()
//    {
//        return $this->belongsTo(Category::class);
//    }
}
