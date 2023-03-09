<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = ['name', 'contact_name', 'address', 'city', 'state', 'country', 'phone_number', 'email','website'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function thresholds()
    {
        return $this->hasMany(ProductThreshold::class);
    }
}
