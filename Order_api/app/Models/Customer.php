<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email',
        'phone_number', 'gender', 'date_of_birth', 'job_title', 'home_phone', 'company_name', 'fax', 'status', 'registered_at','last_login',];

    public function addresses() {
        return $this->hasMany(Address::class);
    }
}