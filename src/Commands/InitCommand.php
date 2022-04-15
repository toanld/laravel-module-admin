<?php
namespace Hungnm28\LaravelModuleAdmin\Commands;

use Illuminate\Console\Command;

class InitCommand extends Command
{

    protected $signature = 'lma:init {--force}';

    protected $description = 'Make admin page';

    public function handle()
    {

        $this->info('lma:init command');
        $this->callSilent('vendor:publish', ['--tag' => 'laravel-module-admin-config', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'laravel-module-admin-model', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'laravel-module-admin-images', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'laravel-module-admin-casts', '--force' => true]);
        $this->info("Run migrate");
        $this->call('migrate');

    }

}
