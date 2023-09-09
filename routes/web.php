<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEditController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


// Route Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile', [ProfileController::class, 'articles'])->name('profile');

// Route users information edit
Route::get('profile/edit', [ProfileEditController::class, 'index'])->name('user_info.edit');


// Route Add Post
Route::get('/profile/add', [ArticleController::class, 'index'])->name('addNew.index');
Route::get('/profile/add', [ArticleController::class, 'create'])->name('addNew.create');
Route::post('/profile/add', [ArticleController::class, 'store'])->name('addNew.store');



// Route edit Post
Route::get('/profile/edit/{id}', [ArticleController::class, 'edit'])->name('edit.post');

// Route update Post
Route::put('/profile/edit/{id}', [ArticleController::class, 'update'])->name('update.post');

// Route Delete Post
Route::delete('/profile/delete/{id}', [ArticleController::class, 'destroy'])->name('delete.post');
