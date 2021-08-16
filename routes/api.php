<?php

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

Route::middleware('auth:api')->get('/songs', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => ['apiauth','throttle:60,1']] , function() {
    Route::group(['prefix' => 'songs'] , function() {
        Route::get('/list' , [App\Http\Controllers\api\SongController::class, 'list']);
        Route::get('/get/{id}' , [App\Http\Controllers\api\SongController::class, 'get']);
        Route::post('/search' , [App\Http\Controllers\api\SongController::class, 'search']);
        Route::get('/getPopular' , [App\Http\Controllers\api\SongController::class, 'getPopular']);
        Route::get('/getNewSongs' , [App\Http\Controllers\api\SongController::class, 'getNewSongs']);
        Route::get('/getSongsByAlbum/{albumId}' , [App\Http\Controllers\api\SongController::class, 'getSongsByAlbum']);
        Route::get('/getSongsByAuthor/{authorId}' , [App\Http\Controllers\api\SongController::class, 'getSongsByAuthor']);
    });

    Route::group(['prefix' => 'albums'] , function() {
        Route::get('/list' , [App\Http\Controllers\api\AlbumController::class, 'list']);
        Route::get('/get/{id}' , [App\Http\Controllers\api\AlbumController::class, 'get']);
        Route::post('/search' , [App\Http\Controllers\api\AlbumController::class, 'search']);
    });

    Route::group(['prefix' => 'authors'] , function() {
        Route::get('/list' , [App\Http\Controllers\api\AuthorController::class, 'list']);
        Route::get('/get/{id}' , [App\Http\Controllers\api\AuthorController::class, 'get']);
        Route::post('/search' , [App\Http\Controllers\api\AuthorController::class, 'search']);
    });
});
