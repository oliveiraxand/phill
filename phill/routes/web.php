<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PersonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('operations/index', [OperationController::class, 'index'])->name('operations.index');
Route::get('operations/create', [OperationController::class, 'create'])->name('operations.create');
Route::post('operations/store', [OperationController::class, 'store'])->name('operations.store');
Route::get('operations/edit/{id}', [OperationController::class, 'edit'])->name('operations.edit');
Route::put('operations/update', [OperationController::class, 'update'])->name('operations.update');
Route::delete('operations/destroy', [OperationController::class, 'destroy'])->name('operations.destroy');

Route::get('enterprises/index', [EnterpriseController::class, 'index'])->name('enterprises.index');
Route::get('enterprises/create', [EnterpriseController::class, 'create'])->name('enterprises.create');
Route::post('enterprises/store', [EnterpriseController::class, 'store'])->name('enterprises.store');
Route::get('enterprises/edit/{id}', [EnterpriseController::class, 'edit'])->name('enterprises.edit');
Route::put('enterprises/update', [EnterpriseController::class, 'update'])->name('enterprises.update');
Route::delete('enterprises/destroy', [EnterpriseController::class, 'destroy'])->name('enterprises.destroy');

Route::get('vehicles/index', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('vehicles/edit/{id}', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('vehicles/update', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('vehicles/destroy', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

Route::get('persons/index', [PersonController::class, 'index'])->name('persons.index');
Route::get('persons/create', [PersonController::class, 'create'])->name('persons.create');
Route::post('persons/store', [PersonController::class, 'store'])->name('persons.store');
Route::get('persons/edit/{id}', [PersonController::class, 'edit'])->name('persons.edit');
Route::put('persons/update', [PersonController::class, 'update'])->name('persons.update');
Route::delete('persons/destroy', [PersonController::class, 'destroy'])->name('persons.destroy');
