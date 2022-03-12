<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use Hungnm28\LaravelModuleAdmin\Traits\CommandTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class MakeRouteCommand extends Command
{
    use CommandTrait;

    protected $signature = 'lma:make-route {name} ';

    protected $description = 'Make Admin Route';

    public function handle()
    {


        $this->info($this->description);
        $this->folder =  $this->argument('name');
        $this->showRoute();
    }

    public function showRoute()
    {

        $stub = $this->getStub('route.stub');
        $template = str_replace(
            [
                'DumMyModule',
                'DumMyClassFolder'
            ],
            [
                $this->getFonderDot(),
                $this->getNamespace()

            ],
            $stub);
        $this->comment('Add the following route to: ' . module_path(config('lma.module.name', 'Route/web.php')));
        $this->line('');
        $this->line($template);
    }
}
