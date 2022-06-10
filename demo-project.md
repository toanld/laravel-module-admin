## DEMO Make new Project

```sh
composer create-project laravel/laravel example-app
 
cd example-app
 
 npm install
 
 npm run dev
 
```
```sh
composer require laravel/jetstream

php artisan jetstream:install livewire

````

```sh
composer require nwidart/laravel-modules

composer require hungnm28/laravel-module-admin
```
### config laravel module
```sh
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
```
### add Autoloading to composer.json

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Modules\\": "Modules/"
    }
  }
}
```
```shell
composer dumpautoload
```
### Make module Admin

```shell
php artisan module:make admin

php artisan lma:init

php artisan lma:install

```

### create new admin

```shell
php artisan lma:create-admin
```

### add to .env file

```dotenv
ASSET_URL=/dev
ASSET_ICON=/assets
APP_SUPER_ADMIN=1
```

### Example create module Category

create Model Category and migration 
```shell
php artisan make:model Category -m 

```
edit file migrate 

```shell
php artisan migrate
```


Create module category
```shell
php artisan lma:make-page category --a
```

## Run mix 

```shell

npm install

npm run dev

cd Modules/Admin

npm install

npm run dev
```
