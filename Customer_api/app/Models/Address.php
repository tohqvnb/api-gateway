<?php

namespace App\Models;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['address_1', 'address_2',
        'city', 'state', 'street_name','post_code', 'country',"customer_id",
        'building', 'apartment_number', 'street_number','created_by','updated_by'];

    public function customers() {
        return $this->belongsTo(Customer::class);
    }
}
