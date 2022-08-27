<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::middleware(['auth:web', 'isAdmin'])->prefix(\App\Services\LanguageService::getLocale())->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('home');
    Route::resource('/post', PostController::class)->except('index');
    Route::get('/category', [PostController::class, 'category'])->name('category');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login_page'])->name('login');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register_page'])->name('register');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
Route::post('/set-locale', \App\Http\Controllers\api\LocaleController::class)->name('set.locale');


Route::get('/', function () {
   return redirect()->route('home');
});
