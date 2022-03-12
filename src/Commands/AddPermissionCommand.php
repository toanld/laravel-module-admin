<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use App\Models\Permission;
use Hungnm28\LaravelModuleAdmin\Traits\CommandTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class AddPermissionCommand extends Command
{
    use CommandTrait;

    protected $signature = 'lma:add-permission {name}';

    protected $description = 'Add permission';

    public function handle()
    {
        $this->folder = $this->argument('name');
        $this->info("Add view permission");
        $name = $this->getPermissionName();
       $parent = Permission::whereName($name)->firstOr(function () use ($name) {
           return Permission::create([
                "name" => $name
                , "title" => Str::headline($name)
            ]);
        });

        $parent_id = data_get($parent,"id",0);

        $this->info("Add Create permission");
        $name = $this->getPermissionName("create");
        Permission::whereName($name)->firstOr(function () use ($name,$parent_id) {
            Permission::create([
                "name" => $name
                , "title" => "Create"
                ,"parent_id"=>$parent_id
            ]);
        });

        $this->info("Add Edit permission");
        $name = $this->getPermissionName("edit");
        Permission::whereName($name)->firstOr(function () use ($name,$parent_id) {
            Permission::create([
                "name" => $name
                , "title" => "Edit"
                ,"parent_id"=>$parent_id
            ]);
        });

        $this->info("Add Delete permission");
        $name = $this->getPermissionName("delete");
        Permission::whereName($name)->firstOr(function () use ($name,$parent_id) {
            Permission::create([
                "name" => $name
                , "title" => "Delete"
                ,"parent_id"=>$parent_id
            ]);
        });
    }
}
