<?php

use App\Http\Controllers\CgDependencyController;
use App\Http\Controllers\CgAcademicAreaController;
use App\Http\Controllers\CgBrandController;
use App\Http\Controllers\CgKindFailureController;
use App\Http\Controllers\CgKindObjectController;
use App\Http\Controllers\CgKindPersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderDeviceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UCommunityController;

//Ruta principal para la página web
Route::get('/', [DashboardController::class, 'index']);

//Ruta sobre el dashboard, todos los usuarios necesitan estar autenticados
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    //Rutas de autenticación
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //CRUD de un elemento, ahorra generar varias rutas, solo se genera un resource
    Route::resource('/cgDependencies', CgDependencyController::class);
    Route::resource('/cgAcademicAreas', CgAcademicAreaController::class);
    Route::resource('/cgBrands', CgBrandController::class);
    Route::resource('/cgKindFailures', CgKindFailureController::class);
    Route::resource('cgKindObjects', CgKindObjectController::class);
    Route::resource('/cgKindPeople', CgKindPersonController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/orderDevice', OrderDeviceController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/UCommunity', UCommunityController::class);


});


