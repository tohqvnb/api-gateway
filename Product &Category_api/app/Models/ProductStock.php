<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $table = 'product_stock';

    protected $fillable = [
        'product_id', 'sku', 'price', 'qty'

    ];

    public function products() {
        return $this->belongsTo(Product::class);
    }
}
