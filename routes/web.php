<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-post', [App\Http\Controllers\PostController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
Route::get('/show-details/{post}', [App\Http\Controllers\PostController::class, 'show_details'])->name('show_details');
Route::get('/download/{file}', [App\Http\Controllers\PostController::class, 'download'])->name('download');
Route::get('/edit-post/{post}', [App\Http\Controllers\PostController::class, 'edit_post'])->name('edit_post');
Route::patch('/update-post/{update}', [App\Http\Controllers\PostController::class, 'update_post'])->name('update_post');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('index');
Route::get('/show-post/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('show-post');
Route::post('/comment-store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment-store');

Route::get('/search-post', [App\Http\Controllers\PostController::class, 'search'])->name('post.search');
Route::get('/show-searh', [App\Http\Controllers\PostController::class, 'show_search'])->name('show_search');