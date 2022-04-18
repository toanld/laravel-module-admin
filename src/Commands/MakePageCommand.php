<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;


class MakePageCommand extends Command
{

    protected $signature = 'lma:make-page {name} {--model=} {--force} {--m} {--p} {--r} {--a} {--parent=}';

    protected $description = 'Make Admin Page';

    public function handle()
    {
        $name = $this->argument('name');
        $arr = explode("/", $name);
        foreach ($arr as $k => $n) {
            $arr[$k] = Str::studly(Str::plural($n));

        }
        $name = implode("/", $arr);
        $modelName = $this->option("model");
        $this->folder = $name;
        if (!$modelName) {
            $modelName = Str::singular($name);
            $modelName = Str::studly($modelName);
        }
        $this->model = $modelName;

        $this->info($this->description);

        $this->call('lma:make-list', ['name' => $name, '--model' => $modelName, '--force' => $this->isForce(),'--parent'=>$this->option("parent")]);
        $this->call('lma:make-create', ['name' => $name, '--model' => $modelName, '--force' => $this->isForce(),'--parent'=>$this->option("parent")]);
        $this->call('lma:make-edit', ['name' => $name, '--model' => $modelName, '--force' => $this->isForce(),'--parent'=>$this->option("parent")]);
        $this->call('lma:make-show', ['name' => $name, '--model' => $modelName, '--force' => $this->isForce(),'--parent'=>$this->option("parent")]);
        if($this->option("m") || $this->option("a")){
            $this->call('lma:model', ['name' => $modelName]);
        }
        if($this->option("p") || $this->option("a")){
            $this->call('lma:add-permission', ['name' => $name,'--parent'=>$this->option("parent")]);
        }
        if($this->option("r") || $this->option("a")){
            $this->call('lma:make-route', ['name' => $name,'--parent'=>$this->option("parent")]);
        }

    }
    protected function isForce()
    {
        return $this->option('force') === true;
    }
}
