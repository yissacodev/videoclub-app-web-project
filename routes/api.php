<?php

use App\Http\Controllers\APICatalogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::controller(APICatalogController::class)->middleware('auth.basic.once')->group(function(){
    // Route::get('apicatalog', 'index');
    // Route::get('apicatalog/{id}', 'show');
    Route::post('apicatalog','store');
    Route::put('apicatalog/{id}','update');
    Route::delete('apicatalog/{id}','destroy');
    Route::put('apicatalog/{id}/rent','putRent');
    Route::put('apicatalog/{id}/return','putReturn');
});
Route::resource('apicatalog', APICatalogController::class,['only' => ['index', 'show']]);