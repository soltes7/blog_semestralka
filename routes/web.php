<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [ArticleController::class, 'index'])->name('article');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
    Route::get('/user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
});

Route::get('/article/{article}/expand', [ArticleController::class, 'expand'])->name('article.expand');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('article', ArticleController::class);
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::get('/article/{article}/delete', [ArticleController::class, 'delete'])->name('article.delete');
});

Route::get('/gallery/{image}/expand', [GalleryController::class, 'expand'])->name('gallery.expand');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('image', GalleryController::class);
    Route::get('/gallery/{image}/delete', [GalleryController::class, 'delete'])->name('gallery.delete');
});


Route::post('/checkEmail', [RegisterController::class, 'checkEmailAvailability'])->name('email_available.check');
Route::post('/checkUsername', [RegisterController::class, 'checkUsernameAvailability'])->name('username_available.check');
