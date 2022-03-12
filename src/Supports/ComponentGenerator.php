<?php

namespace Hungnm28\LaravelModuleAdmin\Supports;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ComponentGenerator
{
    protected $folder;

    public function __construct($folder)
    {
        $this->folder = $folder;
    }

    public function generator()
    {
        $module = config("lma.module.name");
        $folder = Str::studly($this->folder);
        $view_folder = Str::snake($folder, '-');
        $output = [];
        $class = [];
        $view = [];
        $route = [];
        $class["folder"] = $folder;
        $class["path"] = module_path($module, "Http/Livewire/$folder");
        $class["namespace"] = "Modules\\" . Str::studly($module) . "\\Http\\Livewire\\" . $folder;

        $view["path"] = module_path($module, "Resources/views/livewire/$view_folder");
        $view["name"] = $view_folder;
        $route["name"] = config('lma.module.route') . $view_folder;
        $route["prefix"] = $view_folder;
        $output["label"] = $this->formatLabel($folder);
        $output["class"] = (object) $class;
        $output["view"] = (object) $view;
        return (object)$output;
    }

    protected function formatLabel($value)
    {
        return Str::ucfirst(Str::replace(['-', '_'], ' ', $value));
    }

}
