<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AdminMenu extends Model
{
    use HasFactory;

    protected $fillable = ["name", "parent_id", "sort", "icon", "route"];

    public static $listFields = ["id", "name", "parent_id", "sort", "icon", "route", "updated_at", "created_at"];

    public function children(){
        return $this->hasMany(AdminMenu::class,"parent_id");
    }
    public function parent(){
        return $this->belongsTo(AdminMenu::class,"parent_id");
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_admin_menus');
    }

    public function resetRoles($ids)
    {
        $this->roles()->detach();
        Role::find($ids)->map(function ($per) {
            $this->roles()->save($per);
        });
    }

    protected $casts = [
        "name" => "string",
        "parent_id" => "integer",
        "sort" => "integer",
        "icon" => "string",
        "route" => "string",
        "permission" => "string",

    ];
}
