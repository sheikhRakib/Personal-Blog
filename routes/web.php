<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('website.index');

Route::group(['prefix' => 'dashboard', 'as'=>'dashboard.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
});


