<?php

use App\Http\Controllers\APIProductController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Routes for product API
Route::prefix('products')->group(function () {
    Route::get('/view', [APIProductController::class, 'allProduct']);
    Route::post('/add', [APIProductController::class, 'addProduct']);
    Route::post('/delete/{id}', [APIProductController::class, 'deleteProduct']);
    Route::get('/single/{id}', [APIProductController::class, 'singleProduct']);
    Route::get('/single-slug/{slug}', [APIProductController::class, 'singleSlugProduct']);
    Route::post('/edit/{id}', [APIProductController::class, 'updateProduct']);
    Route::post('/search', [APIProductController::class, 'searchProduct']);
});
