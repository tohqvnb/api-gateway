<?php

namespace App\Models;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['address_line', 'address_line_2', 'address_line_3',
        'city', 'state', 'street','zip_code', 'country'];

    public function customers() {
        return $this->belongsToMany(Customer::class(), 'customer_address','address_id','customer_id');
    }
}
