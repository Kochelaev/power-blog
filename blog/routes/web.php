<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', Controllers\Main\IndexController::class)->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', Controllers\Admin\Main\IndexController::class)->name('admin');
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', Controllers\Admin\Category\IndexController::class)->name('category');
    });
});

Auth::routes();
