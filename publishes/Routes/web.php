<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin')->middleware(['auth:sanctum', 'verified', 'lma'])->group(function () {
    Route::get('/', [\Modules\Admin\Http\Controllers\AdminController::class, 'index']);
    Route::prefix('auth')->name('.auth')->group(function () {
        Route::get('/', \Modules\Admin\Http\Livewire\Auth\Index::class);
        Route::prefix('roles')->name('.roles')->group(function () {
            Route::get('/', \Modules\Admin\Http\Livewire\Auth\Roles\Listing::class)->can('roles');
            Route::get('/create', \Modules\Admin\Http\Livewire\Auth\Roles\Create::class)->name('.create')->can('roles.create');
            Route::get('/{record_id}', \Modules\Admin\Http\Livewire\Auth\Roles\Show::class)->name('.show')->can('roles');
            Route::get('/edit/{record_id}', \Modules\Admin\Http\Livewire\Auth\Roles\Edit::class)->name('.edit')->can('roles.edit');
        });
        Route::prefix('permissions')->name('.permissions')->group(function () {
            Route::get('/', \Modules\Admin\Http\Livewire\Auth\Permissions\Listing::class)->can('permissions');
            Route::get('/create', \Modules\Admin\Http\Livewire\Auth\Permissions\Create::class)->name('.create')->can('permissions.create');
            Route::get('/create-group', \Modules\Admin\Http\Livewire\Auth\Permissions\CreateGroup::class)->name('.create-group')->can('permissions.create');
            Route::get('/{record_id}', \Modules\Admin\Http\Livewire\Auth\Permissions\Show::class)->name('.show')->can('permissions');
            Route::get('/edit/{record_id}', \Modules\Admin\Http\Livewire\Auth\Permissions\Edit::class)->name('.edit')->can('permissions.edit');
        });
        Route::prefix('admins')->name('.admins')->group(function () {
            Route::get('/', \Modules\Admin\Http\Livewire\Auth\Admins\Listing::class)->can('admins');
            Route::get('/create', \Modules\Admin\Http\Livewire\Auth\Admins\Create::class)->name('.create')->can('admins.create');
            Route::get('/{record_id}', \Modules\Admin\Http\Livewire\Auth\Admins\Show::class)->name('.show')->can('admins');
            Route::get('/edit/{record_id}', \Modules\Admin\Http\Livewire\Auth\Admins\Edit::class)->name('.edit')->can('admins.edit');
        });
        Route::prefix('admin-menus')->name('.admin-menus')->group(function () {
            Route::get('/', \Modules\Admin\Http\Livewire\Auth\AdminMenus\Listing::class)->can('admin-menus');
            Route::get('/create', \Modules\Admin\Http\Livewire\Auth\AdminMenus\Create::class)->name('.create')->can('admin-menus.create');
            Route::get('/{record_id}', \Modules\Admin\Http\Livewire\Auth\AdminMenus\Show::class)->name('.show')->can('admin-menus');
            Route::get('/edit/{record_id}', \Modules\Admin\Http\Livewire\Auth\AdminMenus\Edit::class)->name('.edit')->can('admin-menus.edit');
        });
    });
});
