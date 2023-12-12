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

Route::middleware(['auth'])->resource('articles', ArticleController::class)->names(
    [
        'index' => 'admin.articles.index',
        'create' => 'admin.articles.create',
        'store' => 'admin.articles.store',
        'show' => 'admin.articles.show',
        'update' => 'admin.articles.update',
        'destroy' => 'admin.articles.destroy',
    ]
);



