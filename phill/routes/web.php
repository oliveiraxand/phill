<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\EnterpriseController;

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