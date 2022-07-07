<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::delete('/usuario/{id}', 'destroy')->name('users.destroy');
    Route::get('/usuarios/{id}', 'showOne')->name('users.showOne');
});
