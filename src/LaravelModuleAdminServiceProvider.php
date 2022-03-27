<?php

namespace Hungnm28\LaravelModuleAdmin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelModuleAdminServiceProvider extends ServiceProvider
{
    protected $commands = [
        Commands\InitCommand::class,
        Commands\MakeLayoutCommand::class,
        Commands\InstallCommand::class,
        Commands\ModelCommand::class,
        Commands\MakePageCommand::class,
        Commands\MakeListCommand::class,
        Commands\MakeCreateCommand::class,
        Commands\MakeEditCommand::class,
        Commands\MakeShowCommand::class,
        Commands\MakeRouteCommand::class,
        Commands\AddPermissionCommand::class,
        Commands\CreateUserCommand::class,
    ];

    public function register()
    {
        parent::register();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lma-admin');
        $this->configureComponents();
        $this->configureCommands();
        $this->registerPublishing();
        $this->registerMiddleware();

    }

    protected function configureCommands()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands($this->commands);
    }

    protected function configureComponents()
    {
        $this->registerComponent('form.field');
        $this->registerComponent('form.input');
        $this->registerComponent('form.textarea');
        $this->registerComponent('form.toggle');
        $this->registerComponent('form.array');
        $this->registerComponent('form.select');
        $this->registerComponent('form.select-multi');
        $this->registerComponent('form.checkbox-multi');
        $this->registerComponent('form.icon');
        $this->registerComponent('form.tags');
        $this->registerComponent('box');
        $this->registerComponent('box.listing');
        $this->registerComponent('box.create');
        $this->registerComponent('box.edit');
        $this->registerComponent('box.show');
        $this->registerComponent('btn.show');
        $this->registerComponent('btn.edit');
        $this->registerComponent('btn.delete');
        $this->registerComponent('btn.confirm');
        $this->registerComponent('header-page');
        $this->registerComponent('btn.toggle');
        $this->registerComponent('label.tags');
        $this->registerComponent('label.toggle');
        $this->registerComponent('flash-message');
    }

    protected function registerComponent(string $component)
    {
        Blade::component('lma-admin::components.' . $component, 'lma-' . $component);
        Blade::component('lma-admin::components.' . $component, 'lma.' . $component);
    }

    protected function registerMiddleware()
    {
        app('router')->aliasMiddleware('lma', \Hungnm28\LaravelModuleAdmin\Middleware\Admin::class);

    }

    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../publishes/config' => config_path()], 'laravel-module-admin-config');
            $this->publishes([__DIR__ . '/../publishes/resources/images' => public_path("assets/images")], 'laravel-module-admin-images');
            $this->publishes([__DIR__ . '/../publishes/app/Casts' => app_path('Casts')], 'laravel-module-admin-casts');
            $this->publishes([
                __DIR__ . '/../publishes/database' => database_path(),
                __DIR__ . '/../publishes/app/Models' => app_path('Models'),
            ], 'laravel-module-admin-model');

        }
    }

}
