<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductThreshold extends Model
{
    protected $table = 'product_threshold';

    protected $fillable = [
        'product_id', 'minimum_quantity', 'maximum_quantity', 'supplier_id',

    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

}
