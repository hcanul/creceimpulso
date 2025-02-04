<?php

use App\Livewire\Configuracion\AsignPermissions\AsingPermissionController;
use App\Livewire\Configuracion\Roles\RoleCotroller;
use App\Livewire\Configuracion\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::group(['prefix' => 'Configuracion'], function(){
        Route::middleware(['role:SuperAdmin|SuperUser'])->group(function(){
            Route::get('Roles', RoleCotroller::class)->name('Configuracion.roles');
            Route::get('Asignar-pemisos', AsingPermissionController::class)->name('Configuracion.asignpermissions');
            Route::get('Users', UserController::class)->name('Configuracion.users');
        });
    });
});
