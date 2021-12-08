<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\UploadImageController;

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
/* frontend Route */
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'getAllImage'])->name('/');
Route::post('register', [UserController::class, 'register'])->name('register');
/* Prefix admin url to login  */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Auth::routes();
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

/* if use "/admin" url auto redirect to /admin/login*/
Route::get('admin', function(){
    return redirect()->route('login');
});

/* Dashboard open after login user / admin */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    /* upload image routes */
    Route::get('uploaded-image-lists', [UploadImageController::class, 'index'])->name('uploaded-image-lists');
    Route::get('upload-new', [UploadImageController::class, 'create'])->name('upload-new');
    Route::post('store', [UploadImageController::class, 'store'])->name('store');
    Route::any('edit/{id}', [UploadImageController::class, 'edit'])->name('edit');
    Route::any('update/{id}', [UploadImageController::class, 'update'])->name('update');
    Route::get('delete/{id}', [UploadImageController::class, 'destroy'])->name('delete');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

});