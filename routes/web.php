<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('/');
// Route::get('/', [UserController::class, 'getAllImage'])->name('/');
Route::post('register', [UserController::class, 'register'])->name('register');

Route::group(['prefix' => 'admin' ], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('uploaded-image-lists', [UploadImageController::class, 'index'])->name('uploaded-image-lists');
    Route::get('upload-new', [UploadImageController::class, 'create'])->name('upload-new');
    Route::post('store', [UploadImageController::class, 'store'])->name('store');
    Route::any('edit/{id}', [UploadImageController::class, 'edit'])->name('edit');
    Route::any('update/{id}', [UploadImageController::class, 'update'])->name('update');
    Route::get('delete/{id}', [UploadImageController::class, 'destroy'])->name('delete');
});