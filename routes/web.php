<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add-blog',[BlogController::class,'storeblog'])->name('store.blog');
Route::get('/edit-blog/{id}',[BlogController::class,'editblog']);
Route::post('/update-blog',[BlogController::class,'updateBlog'])->name('update.blog');
Route::get('/BlogDelete/{id}',[BlogController::class,'deleteBlog']);
