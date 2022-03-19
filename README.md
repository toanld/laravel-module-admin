# Laravel module admin
### The package used for create laravel admin.


## Installation

Requires [Laravel Module](https://nwidart.com/laravel-modules/v6/introduction) 6.0+ to run.

Install:

```sh
composer require hungnm28/laravel-module-admin
npm install -D @tailwindcss/aspect-ratio
npm install -D @tailwindcss/line-clamp
```
Create module admin by [Laravel Module](https://nwidart.com/laravel-modules/v6/basic-usage/creating-a-module)

Config module componet conponent at `Modules/<your module name>/providers/<Module Name>ServiceProvider.php`
```file
+  use Illuminate\Support\Facades\Blade;
 ...
 $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
+ Blade::componentNamespace('Modules\\<Module Name>\\Views\\Components', '<component name>');
```


Edit config module at file: `config/lma.php`

Add this to .env file
```sh
ASSET_URL=/dev
ASSET_ICON=/assets
APP_SUPER_ADMIN=<list super admin id eg: 1,2,3>
```

Run command
```sh
php artisan lma:init
php artisan lma:install
cd Modules/<Module name>
npm install
npm run dev

```

## Create Page
```sh
    php artisan lma:page <Page Name> <Model Name>
```

