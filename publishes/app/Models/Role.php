<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ["name", "title"];

    public function permissions()
    {

        return $this->belongsToMany(Permission::class, 'roles_permissions');

    }

    public function resetPermissions($ids)
    {
        $this->permissions()->detach();
        Permission::find($ids)->map(function ($per) {
            $this->permissions()->save($per);
        });
    }

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_roles');

    }
}
