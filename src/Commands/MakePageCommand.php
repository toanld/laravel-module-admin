<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;


class MakePageCommand extends Command
{

    protected $signature = 'lma:make-page {name} {--model=}';

    protected $description = 'Make Admin Page';

    public function handle()
    {
        $name = $this->argument('name');
        $modelName = $this->option("model");
        $name = $this->argument('name');
        $arr = explode("/",$name);
        foreach($arr as $k=>$n){
            $arr[$k] = Str::studly(Str::plural($n));

        }
        $name = implode("/",$arr);
        $modelName = $this->option("model");
        $this->folder = $name;
        if (!$modelName) {
            $modelName = Str::singular($name);
            $modelName = Str::studly($modelName);
        }
        $this->model = $modelName;

        $this->info($this->description);
        $this->call('lma:make-list', ['name' => $name, '--model' => $modelName]);
        $this->call('lma:make-create', ['name' => $name, '--model' => $modelName]);
        $this->call('lma:make-edit', ['name' => $name, '--model' => $modelName]);
        $this->call('lma:make-show', ['name' => $name, '--model' => $modelName]);
        $this->call('lma:add-permission', ['name' => $name]);
        $this->call('lma:make-route', ['name' => $name]);
    }
}
