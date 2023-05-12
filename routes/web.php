<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gallerycreate;
use App\Http\Controllers\HomeController;

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

Route::get('/',[gallerycreate::class, 'welcome'])->name('welcome');
Route::get('/photo/{id}',[gallerycreate::class, 'photoview'])->name('photoview');
Route::get('/gallery/{id}',[gallerycreate::class, 'galleryview'])->name('galleryview');
    

Route::group(['middleware'=>'auth'], function(){
    Route::prefix('/user/')->group(function(){
        Route::get('galleries/create', [gallerycreate::class, 'gallerycreate'])->name('gallerycreate');
        Route::post('galleries/store', [gallerycreate::class, 'gallerystore'])->name('gallerystore');
        Route::get('galleries/show/{id}', [gallerycreate::class, 'galleryshow'])->name('galleryshow');
        Route::get('galleries/edit/{id}', [gallerycreate::class, 'galleryedit'])->name('galleryedit');
        Route::post('galleries/update/{id}', [gallerycreate::class, 'galleryupdate'])->name('galleryupdate');
        Route::get('galleries/delete/{id}', [gallerycreate::class, 'gallerydelete'])->name('gallerydelete');

        // create photo route
        Route::get('galleries/photos/create/{id}', [gallerycreate::class, 'photocreate'])->name('photocreate');
        Route::post('galleries/photos/store', [gallerycreate::class, 'photostore'])->name('photostore');
        Route::get('galleries/photos/show/{id}', [gallerycreate::class, 'photoshow'])->name('photoshow');
        Route::get('galleries/photos/edit/{id}', [gallerycreate::class, 'photoedit'])->name('photoedit');
        Route::post('galleries/photos/update/{id}', [gallerycreate::class, 'photoupdate'])->name('photoupdate');
        Route::get('galleries/photos/delete/{id}', [gallerycreate::class, 'photodelete'])->name('photodelete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
