<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use Hungnm28\LaravelModuleAdmin\Traits\CommandTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeLayoutCommand extends Command
{
    use CommandTrait;
    protected $signature = 'lma:make-layout {--force}';

    protected $description = 'Make admin layout';

    public function handle()
    {
        $this->info($this->description);
        $this->initModule();
        $this->makeClass();
        $this->makeView();

    }

    private function makeClass(){
        dd($this->module);
        $pathSave = module_path(config("lma.module.name"),"Views/Components/LayoutMaster.php");
        $this->ensureDirectoryExists($pathSave);
        $stub = $this->getStub('layout-class.stub');
        return File::put($pathSave, $stub);
    }
    private function makeView(){
        $stub = $this->getStub("layout-view.stub");
        $pathSave = $this->view_path("layouts/master.blade.php");
        return File::put($pathSave, $stub);
    }

}
