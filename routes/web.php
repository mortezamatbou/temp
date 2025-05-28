<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PaymentController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
    return view('front.index');
});

Route::get('film', function() {
    $result = Category::with('film')->get();
    $data = [];
    foreach($result as $row) {
        $data[$row->title] = $row->film->count();
        $data[$row->title] = $row->film()->count();
    }

    return $data;
});


Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'list']);
    Route::get('/users', [ArticleController::class, 'users']);
    Route::get('/helper', [ArticleController::class, 'helper']);
    Route::get('/helper2', [ArticleController::class, 'helper2']);
    Route::get('/trait', [ArticleController::class, 'trait']);
    Route::get('/services', PaymentController::class);
    Route::get('/{id}', [ArticleController::class, 'detail']);
});
