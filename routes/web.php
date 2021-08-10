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
});

Route::group(['prefix' => 'auth'] , function() {
    Route::post('/login', [App\Http\Controllers\backend\Auth\AuthController::class, 'login']);
});
