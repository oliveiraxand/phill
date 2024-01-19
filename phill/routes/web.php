<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationController;

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
Route::get('operation/index', [OperationController::class, 'index'])->name('operation.index');
Route::get('operation/create', [OperationController::class, 'create'])->name('operation.create');
Route::post('operation/store', [OperationController::class, 'store'])->name('operation.store');