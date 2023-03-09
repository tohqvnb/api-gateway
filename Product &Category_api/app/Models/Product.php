<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price',
        'product_code','status', 'supplier_id','discount',
        'slug', 'featured','available','product_image','is_physical','size',
        'color', 'brand_id', 'starts_at', 'ends_at'
        ];


    public function suppliers() {
        return $this->belongsTo(Supplier::class);
    }
    public function brands() {
        return $this->belongsTo(Brand::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function product_price()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function product_stock()
    {
        return $this->hasOne(ProductStock::class);
    }

    public function product_threshold()
    {
        return $this->hasMany(ProductThreshold::class);
    }


}
