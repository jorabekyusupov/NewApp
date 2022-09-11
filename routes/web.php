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
Route::middleware(['auth:web'])->prefix(\App\Services\LanguageService::getLocale())->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('home');
    Route::resource('/post', PostController::class)->except('index');
    Route::get('/category', [PostController::class, 'category'])->name('category');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::resource('/role', \App\Http\Controllers\RoleController::class);
    Route::resource('/permission', \App\Http\Controllers\PermissionController::class);
    Route::post('/assign', [\App\Http\Controllers\UserController::class, 'assignRole'])->name('assign-role');
    Route::get('/assign', [\App\Http\Controllers\UserController::class, 'assignCreate'])->name('assign-create');
    Route::get('/import', [\App\Http\Controllers\UserController::class, 'import'])->name('user.import');
    Route::get('/export', [\App\Http\Controllers\UserController::class, 'export'])->name('user.export');
});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login_page'])->name('login');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register_page'])->name('register');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
Route::post('/set-locale', \App\Http\Controllers\api\LocaleController::class)->name('set.locale');


Route::get('/', function () {
   return redirect()->route('home');
});
