<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/' , function() {
    return redirect()->route('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'] , function() {
    Route::get('/home', [App\Http\Controllers\backend\HomeController::class, 'home'])->name('home');
    Route::get('/getAppName', [App\Http\Controllers\backend\HomeController::class, 'getAppName']);

    Route::group(['prefix' => 'songs'] , function() {
        Route::get('/list' , [App\Http\Controllers\backend\SongController::class, 'list'])->name('songs');
        Route::get('/all' , [App\Http\Controllers\backend\SongController::class, 'getAll']);
        Route::get('/get/{id}' , [App\Http\Controllers\backend\SongController::class, 'get']);
        Route::get('/create' , [App\Http\Controllers\backend\SongController::class, 'create']);
        Route::post('/create' , [App\Http\Controllers\backend\SongController::class, 'store']);
        Route::get('/edit/{id}' , [App\Http\Controllers\backend\SongController::class, 'edit']);
        Route::put('/edit/{id}' , [App\Http\Controllers\backend\SongController::class, 'update']);
        Route::delete('/delete/{id}' , [App\Http\Controllers\backend\SongController::class, 'delete']);
    });

    Route::group(['prefix' => 'authors'] , function() {
        Route::get('/list' , [App\Http\Controllers\backend\AuthorController::class, 'list'])->name('authors');
        Route::get('/all' , [App\Http\Controllers\backend\AuthorController::class, 'getAll']);
        Route::get('/get/{id}' , [App\Http\Controllers\backend\AuthorController::class, 'get']);
        Route::get('/create' , [App\Http\Controllers\backend\AuthorController::class, 'create']);
        Route::post('/create' , [App\Http\Controllers\backend\AuthorController::class, 'store']);
        Route::get('/edit/{id}' , [App\Http\Controllers\backend\AuthorController::class, 'edit']);
        Route::put('/edit/{id}' , [App\Http\Controllers\backend\AuthorController::class, 'update']);
        Route::delete('/delete/{id}' , [App\Http\Controllers\backend\AuthorController::class, 'delete']);
    });

    Route::group(['prefix' => 'albums'] , function() {
        Route::get('/list' , [App\Http\Controllers\backend\AlbumController::class, 'list'])->name('albums');
        Route::get('/all' , [App\Http\Controllers\backend\AlbumController::class, 'getAll']);
        Route::get('/get/{id}' , [App\Http\Controllers\backend\AlbumController::class, 'get']);
        Route::get('/create' , [App\Http\Controllers\backend\AlbumController::class, 'create']);
        Route::post('/create' , [App\Http\Controllers\backend\AlbumController::class, 'store']);
        Route::get('/edit/{id}' , [App\Http\Controllers\backend\AlbumController::class, 'edit']);
        Route::put('/edit/{id}' , [App\Http\Controllers\backend\AlbumController::class, 'update']);
        Route::delete('/delete/{id}' , [App\Http\Controllers\backend\AlbumController::class, 'delete']);
    });

    Route::group(['prefix' => 'token'] , function() {
        Route::get('/getToken' , [App\Http\Controllers\backend\TokenController::class, 'get']);
        Route::get('/edit' , [App\Http\Controllers\backend\TokenController::class, 'edit'])->name('token');
        Route::put('/edit' , [App\Http\Controllers\backend\TokenController::class, 'update']);
    });
});

Route::group(['prefix' => 'auth'] , function() {
    Route::post('/login', [App\Http\Controllers\backend\Auth\AuthController::class, 'login']);
});
