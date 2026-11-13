<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Доступно всем (гостям и всем авторизованным)
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/category', [ArticleController::class, 'category'])->name('category');

// Авторизация
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Журналист
Route::middleware(['auth', 'role:journalist,admin'])->group(function () {
    Route::get('/journalist', function () {
        return view('pages.journalist');
    })->name('journalist');

    Route::post('/journalist', [ArticleController::class, 'store'])->name('journalist.store');
});

// Только для Админа
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::delete('/admin/article/{id}', [AdminController::class, 'destroyArticle'])->name('admin.article.destroy');
    Route::post('/admin/role', [AdminController::class, 'updateRole'])->name('admin.role.update');
});