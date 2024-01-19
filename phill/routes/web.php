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
Route::get('operations/index', [OperationController::class, 'index'])->name('operations.index');
Route::get('operations/create', [OperationController::class, 'create'])->name('operations.create');
Route::post('operations/store', [OperationController::class, 'store'])->name('operations.store');