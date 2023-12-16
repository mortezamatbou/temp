<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login_form'])->name('admin.login.form');
Route::post('/', [LoginController::class, 'login'])->name('admin.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->controller(DashboardController::class)
    ->group(function () {
        Route::get('/', 'home')->name('admin.dashboard');
    });

Route::middleware(['auth'])->prefix('articles')->controller(ArticleController::class)->group(function () {
    Route::middleware('can:list articles')->get('/', 'index')->name('admin.articles.index');
    Route::middleware('can:create articles')->get('/create', 'create')->name('admin.articles.create');
    Route::middleware('can:create articles')->post('/', 'store')->name('admin.articles.store');
    Route::middleware('can:detail articles')->get('/{article}', 'show')->name('admin.articles.show');
    Route::middleware('can:update articles')->put('/{article}', 'update')->name('admin.articles.update');
    Route::middleware('can:delete articles')->delete('/{article}', 'destroy')->name('admin.articles.delete');
});


