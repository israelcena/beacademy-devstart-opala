<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    HomeController,
    UserController,
    AdminController,
    ProductController
};

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth')->group(function () {    
    Route::controller(UserController::class)->group(function () {
    Route::get('/usuarios', 'index')->name('users.index');
    Route::post('/novousuario/criar', 'store')->name('users.store');
    Route::get('/novousuario', 'create')->name('users.create');
    Route::delete('/usuario/{id}', 'destroy')->name('users.destroy');
    Route::get('/usuarios/{id}', 'showOne')->name('users.showOne');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/usuarios', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/usuarios/{id}', [AdminController::class, 'showOne'])->name('admin.users.showOne');
    Route::post('/admin/usuarios/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/usuarios/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/usuarios/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::get('/admin/usuarios/novo', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/usuarios/novo', [AdminController::class, 'store'])->name('admin.users.store');
                        /* ---------- PRODUTOS ADMINISTRADOR --------- */
    
    Route::put('/admin/produtos/{id}', [ProductController::class, 'update'])->name('admin.products.update');                        
    Route::get('/admin/produtos/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/admin/produtos/novo', [ProductController::class, 'productCreate'])->name('admin.product.productCreate');    
    Route::post('/admin/produto', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/produtos', [ProductController::class, 'products'])->name('admin.product.products');    
    Route::get('/admin/produtos/{id}', [ProductController::class, 'showProduct'])->name('admin.products.show');    
    

});