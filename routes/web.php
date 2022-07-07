<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::get('/usuarios/{id}', 'showOne')->name('users.showOne');
});
