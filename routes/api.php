<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsController;

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

Route::group(['prefix' => 'posts'], function() {
    Route::get('/index', [postsController::class, 'index']);
    Route::get('/index/pagination', [postsController::class, 'indexPagination']);
    Route::post('/store', [postsController::class, 'store']);
    Route::get('/edit/{id}', [postsController::class, 'show']);
    Route::put('/update/{id}', [postsController::class, 'update']);
    Route::delete('/delete/{id}', [postsController::class, 'destroy']);
});

