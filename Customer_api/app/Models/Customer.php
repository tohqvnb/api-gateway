<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'gender'];

    public function addresses() {
        return $this->belongsToMany(Address::class, 'customer_address','customer_id','address_id');
    }
}
