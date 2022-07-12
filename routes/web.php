<?php

use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';


Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::post('/novousuario/criar', 'store')->name('users.store');
    Route::get('/novousuario', 'create')->name('users.create');
    Route::delete('/usuario/{id}', 'destroy')->name('users.destroy');
    Route::get('/usuarios/{id}', 'showOne')->name('users.showOne');
});
