<?php

use App\Http\Controllers\Back\{AreaController, DashboardController, DeviceController, NavigationController};
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\MikrotikController;
use App\Http\Controllers\Permissions\{AssignController, PermissionController, RoleController, UserController};
use App\Http\Controllers\User\AddUserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::middleware('has.role')->prefix('settings')->group(function () {
        Route::prefix('mikrotik')->group(function () {
            Route::controller(MikrotikController::class)->middleware('permission:create mikrotik')->prefix('hotspot')->name('hotspot.')->group(function () {
                Route::get('', 'table')->name('table');
            });
        });

        Route::prefix('role-and-permission')->group(function () {

            Route::controller(AssignController::class)->middleware('permission:assign permissions')->prefix('assign')->name('assign.')->group(function () {
                Route::get('', 'table')->name('table');
                Route::post('', 'store');
                Route::get('/{role}/edit', 'edit')->name('edit');
                Route::put('/{role}/edit', 'update');

                Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
                    Route::get('', 'table')->name('table');
                    Route::post('', 'store');
                    Route::get('/{user}/edit', 'edit')->name('edit');
                    Route::put('/{user}/edit', 'update');
                });
            });

            Route::controller(RoleController::class)->middleware('permission:assign permissions')->prefix('roles')->name('roles.')->group(function () {
                Route::get('', 'table')->name('table');
                Route::post('', 'store')->name('create');
                Route::put('/{role}', 'update')->name('update');
                Route::delete('/{role}', 'destroy')->name('delete');
            });

            Route::controller(PermissionController::class)->prefix('permissions')->name('permissions.')->group(function () {
                Route::get('', 'table')->name('table');
                Route::post('', 'store')->name('create');
                Route::put('/{permission}', 'update')->name('update');
                Route::delete('/{permission}', 'destroy')->name('delete');
            });
        });

        Route::controller(AddUserController::class)->middleware('permission:create users')
            ->prefix('users')->name('users.')->group(function () {
                Route::get('', 'table')->name('table');
                Route::get('create', 'create')->name('create');
                Route::post('create', 'store');
            });

        Route::controller(DeviceController::class)->middleware('permission:create devices')
            ->prefix('devices')->name('devices.')->group(function () {
                Route::get('', 'table')->name('table');
                Route::get('create', 'create')->name('create');
                Route::post('create', 'store');
                Route::get('{device}/edit', 'edit')->name('edit');
                Route::put('{device}/edit', 'update');
            });

        Route::controller(AreaController::class)->middleware('permission:create areas')
            ->prefix('coverage')->name('areas.')->group(function () {
                Route::get('', 'table')->name('table');
                Route::get('create', 'create')->name('create');
                Route::post('create', 'store');
                Route::get('{area}/edit', 'edit')->name('edit');
                Route::put('{area}/edit', 'update');
            });

        Route::controller(NavigationController::class)->middleware('permission:create navigations')
            ->prefix('navigations-sidebar')->name('sidebar.')->group(function () {
                Route::get('', 'table')->name('table');
                Route::post('', 'store');
            });
    });
});


require __DIR__ . '/auth.php';
