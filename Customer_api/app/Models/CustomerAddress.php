<?php

namespace App\Models;
use App\Models\Customer;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table = 'customer_address';

    protected $fillable = ['customer_id', 'address_id'];

    public function customers() {
        return $this->belongsToMany(Customer::class);
    }

    public function addresses() {
        return $this->belongsToMany(Address::class);
    }
}
