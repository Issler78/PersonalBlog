<?php

use App\Http\Controllers\Admin\PostController;
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

Route::get('/IsslerBlog', [PostController::class, 'index'])->name('IsslerBlog.index');
Route::get('/IsslerBlog/publish', [PostController::class, 'create'])->name('IsslerBlog.publish');
Route::post('/IsslerBlog/publish', [PostController::class, 'store'])->name('IsslerBlog.store');
Route::get('/IsslerBlog/{id}/edit', [PostController::class, 'edit'])->name('IsslerBlog.edit');
Route::put('/IsslerBlog/{id}/edit', [PostController::class, 'update'])->name('IsslerBlog.update');