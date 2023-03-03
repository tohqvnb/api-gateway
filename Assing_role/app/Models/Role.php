<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

//    public function permissions()
//    {
//        return $this->belongsToMany(Permission::class);
//    }

//    public function hasPermission($permission)
//    {
//        if (is_string($permission)) {
//            return $this->permissions->contains('name', $permission);
//        }
//
//        return !! $permission->intersect($this->permissions)->count();
//    }
}
