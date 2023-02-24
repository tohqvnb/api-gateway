<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Authors extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $fillable = ['name', 'email', 'password', 'phone_number'];
    
}