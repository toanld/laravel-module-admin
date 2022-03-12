<?php

namespace Hungnm28\LaravelModuleAdmin\Traits;

use Hungnm28\LaravelModuleAdmin\Supports\ModelGenerator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait CommandTrait
{
    private $folder, $component, $model, $modelPath, $fields = [];

    private function initModule()
    {
        $name = config("lma.module.name");
        if ($this->laravel['modules']->find($name)) {
            return true;
        }
        $this->error("Module not found: $name");
        return false;
    }

    private function generateModel($name)
    {
        $this->info("$this->description ");
        $ModelGenerator = new ModelGenerator($name);
        $this->fields = $ModelGenerator->getFields();
    }

    private function generateComponent()
    {

    }

    private function checkFilePath($path)
    {
        if (File::exists($path)) {
            $this->line(" WHOOPS-IE-TOOTLES </> 😳 \n");
            $this->line("Class already exists:</> $path \n ");
            return false;
            // unlink($path);
        }
        return true;
    }

    private function getStub($path)
    {
        $path = __DIR__ . "/../Commands/stubs/$path";
        if (!File::exists($path)) {
            $this->error("WHOOPS-IE-TOOTLES  😳 \n");
            $this->error("Stubs not exists: $path \n ");
            return false;
        }
        return file_get_contents($path);
    }

    private function view_path($path)
    {
        $view_folder = $this->getViewFolder();
        $path = module_path(config("lma.module.name"), "Resources/views/livewire/$view_folder/$path");
        $this->checkFilePath($path);
        $this->ensureDirectoryExists($path);
        return $path;
    }

    private function class_path($path)
    {
        $path = module_path(config("lma.module.name"), "Http/livewire/$this->folder/$path");
        $this->checkFilePath($path);
        $this->ensureDirectoryExists($path);
        return $path;
    }

    private function ensureDirectoryExists($path)
    {
        $path = dirname($path);
        (new Filesystem)->ensureDirectoryExists($path);
    }

    private function getClassFolder()
    {
        $folder = $this->folder;

    }

    private function getViewFolder()
    {
        $arr = explode("/", $this->folder);

        foreach ($arr as $k => $a) {
            $arr[$k] = Str::snake($a, '-');
        }
        return implode("/", $arr);
    }

    private function getNamespace()
    {
        return Str::replace("/", "\\", config("lma.module.namespace") . "\Http\Livewire\\$this->folder");
    }

    private function getFonderDot()
    {
        return Str::replace("/", ".", $this->getViewFolder());
    }

    private function getHeadline()
    {
        return Str::headline(Str::replace("/", " ", $this->folder));
    }

    private function getPermissionName($type = "")
    {
        $name = basename($this->folder);
        $name = Str::kebab($name);
        $name = Str::plural($name);
        if ($type) {
            $name .= "." . Str::kebab($type);
        }
        return $name;
    }
}
