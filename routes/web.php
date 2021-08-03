<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'], function(){
    Route::get('/', [PageController::class, 'index'])->name('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('articles', ArticleController::class);
});

require __DIR__.'/auth.php';
