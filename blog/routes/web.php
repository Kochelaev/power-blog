<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Http\Controllers\Controller;

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
        Route::get('/', Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}/update}', Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}/delete', Controllers\Admin\Category\DeleteController::class)->name('admin.category.delete');
    });

    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', Controllers\Admin\Tag\IndexController::class)->name('admin.tag.index');
        Route::get('/create', Controllers\Admin\Tag\CreateController::class)->name('admin.tag.create');
        Route::post('/', Controllers\Admin\Tag\StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', Controllers\Admin\Tag\ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', Controllers\Admin\Tag\EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}/update}', Controllers\Admin\Tag\UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}/delete', Controllers\Admin\Tag\DeleteController::class)->name('admin.tag.delete');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', Controllers\Admin\Main\IndexController::class)->name('admin');
    
});

Auth::routes();
