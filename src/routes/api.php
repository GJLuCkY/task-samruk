<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\ErrorController;
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
Route::fallback([ErrorController::class, 'notFound'])->name('api.fallback.404');

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('{postId}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/', [PostController::class, 'create'])->name('posts.create');
    Route::put('{postId}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('{postId}', [PostController::class, 'delete'])->name('posts.delete');
});
