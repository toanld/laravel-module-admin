# Laravel module admin
### The package used for create laravel admin.


## Installation

Requires [Laravel Module](https://nwidart.com/laravel-modules/v6/introduction) 6.0+ to run.

Install:

```sh
composer require hungnm28/laravel-module-admin
```
Create module admin by [Laravel Module](https://nwidart.com/laravel-modules/v6/basic-usage/creating-a-module)


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
    php artisan lma:make-page {name} {--model=} {--force} {--m} {--p} {--r} {--mpr} {--parent=}
```
## Create Permission
```shell
php artisan lma:add-permission {name} {--force} {--parent=}
```
## Create Route
```shell
php artisan lma:make-route {name} {--force}  {--parent=}
```
## Create Admin
```shell
php artisan lma:create-admin
```

