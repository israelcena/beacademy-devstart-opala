<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    HomeController,
    UserController,
    AdminController,
};

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth')->group(function () {    
    Route::controller(UserController::class)->group(function () {
    Route::get('/perfil/{id}/edit', [UserController::class, 'show'])->name('users.edit');
    Route::get('/perfil/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/usuarios/{id}', 'showDetails')->name('users.showDetails');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/usuarios', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/usuarios/novo', [AdminController::class, 'create_user'])->name('admin.users.create');
    Route::post('/admin/usuarios/novo', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/usuarios/{id}', [AdminController::class, 'show'])->name('admin.user.show');
    Route::post('/admin/usuarios/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/usuarios/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    
});