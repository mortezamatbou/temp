<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login_form'])->name('admin.login.form');
Route::post('/', [LoginController::class, 'login'])->name('admin.login');

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->controller(DashboardController::class)
    ->group(function () {

        Route::get('/', 'home');

    });


