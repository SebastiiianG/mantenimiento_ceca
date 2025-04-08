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
use App\Http\Controllers\ReportNotesController
;


//Ruta principal para la página web
Route::get('/', [DashboardController::class, 'index']);

Route::get('/orders/reportNotes/edit', [ReportNotesController::class, 'edit'])->name('orders.reportNotes.edit');
Route::post('/orders/reportNotes/update', [ReportNotesController::class, 'update'])->name('orders.reportNotes.update');

//Ruta sobre el dashboard, todos los usuarios necesitan estar autenticados
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    //Rutas de autenticación
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //CRUD de un elemento, ahorra generar varias rutas, solo se genera un resource
    Route::resource('/cgDependencies', CgDependencyController::class);
    Route::resource('/cgAcademicAreas', CgAcademicAreaController::class);
    Route::resource('/cgBrands', CgBrandController::class);
    Route::resource('/cgKindFailures', CgKindFailureController::class);
    Route::resource('/cgKindObjects', CgKindObjectController::class);
    Route::resource('/cgKindPeople', CgKindPersonController::class);
    Route::resource('/users', UserController::class);
    Route::get('/orders/academic-areas', [OrderController::class, 'getAcademicAreas']);
    Route::resource('/orders', OrderController::class);
    Route::resource('/orderDevices', OrderDeviceController::class);
    Route::resource('/roles', RoleController::class);
    //Eliminar la ruta de UCommunity después del testeo
    Route::resource('/UCommunity', UCommunityController::class);

    // Rutas para las notas de los reportes
    Route::get('/orders/reportNotes/edit', [ReportNotesController::class, 'edit'])->name('orders.reportNotes.edit');
    Route::post('/orders/reportNotes/update', [ReportNotesController::class, 'update'])->name('orders.reportNotes.update');


    //Ruta para el reporte
    Route::get('/orders/{order}/report', [OrderController::class, 'report'])->name('orders.report');

});


