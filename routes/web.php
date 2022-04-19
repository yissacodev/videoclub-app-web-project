<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\APICatalogController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'getHome']);
Route::get('ejemplos/ejemplo', [HomeController::class, 'getHome']);
// Route::get('login', function () {
//     return view('auth.login');
// });

// Route::get('catalog', [CatalogController::class, 'getIndex']);
// Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);
// Route::get('catalog/create', [CatalogController::class, 'getCreate']);
// Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);

//Rutas de controlador agrupadas
Route::controller(CatalogController::class)->middleware('auth')->group(function(){
    Route::get('catalog', 'getIndex');
    Route::get('catalog/show/{id}', 'getShow');
    Route::get('catalog/create', 'getCreate');
    Route::get('catalog/edit/{id}', 'getEdit');
    Route::post('catalog/create', 'postCreate');
    Route::put('catalog/edit/{id}', 'putEdit');
    // Route::put('catalog/edit/{id}', 'putEdit');
    Route::put('catalog/rent/{id}', 'putRent');
    Route::put('catalog/return/{id}', 'putReturn');
    Route::delete('catalog/delete/{id}', 'deleteMovie');

});
Auth::routes();


/*Rutas de APICatalogController */


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
