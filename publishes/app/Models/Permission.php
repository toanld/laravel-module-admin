<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ["name", "title", "parent_id"];

    public function roles()
    {

        return $this->belongsToMany(Role::class, 'roles_permissions');

    }

    public function parent()
    {
        return $this->belongsTo(Permission::class, "parent_id");
    }

    public function children()
    {
        return $this->hasMany(Permission::class, "parent_id");
    }

    public function resetRoles($ids)
    {
        $this->roles()->detach();
        Role::find($ids)->map(function ($per) {
            $this->roles()->save($per);
        });
    }

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_roles');

    }
}
