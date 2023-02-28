<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $guarded = array('id');
    public $timestamps = false;
}
