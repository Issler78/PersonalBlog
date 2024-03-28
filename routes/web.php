<?php

use App\Http\Controllers\Admin\{PostController, ReplyController};
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

// Profile
Route::get('/IsslerBlog/authenticate', function () {
    return view('IsslerBlog.Authenticate.IsslerBlog-authenticate');
})->name('IsslerBlog.authenticate');

// Posts
Route::get('/IsslerBlog', [PostController::class, 'index'])->name('IsslerBlog.index');
Route::get('/IsslerBlog/publish', [PostController::class, 'create'])->name('IsslerBlog.publish');
Route::post('/IsslerBlog/publish', [PostController::class, 'store'])->name('IsslerBlog.store');
Route::get('/IsslerBlog/{id}', [PostController::class, 'show'])->name('IsslerBlog.show');
Route::get('/IsslerBlog/{id}/edit', [PostController::class, 'edit'])->name('IsslerBlog.edit');
Route::put('/IsslerBlog/{id}/edit', [PostController::class, 'update'])->name('IsslerBlog.update');
Route::delete('/IsslerBlog/{id}', [PostController::class, 'destroy'])->name('IsslerBlog.destroy');

Route::get('/IsslerBlog/{category}/category', [PostController::class, 'index'])->name('IsslerBlog.category');

// Replies
Route::post('/IsslerBlog/publish/reply', [ReplyController::class, 'store'])->name('IsslerBlog.reply.publish');
Route::delete('/IsslerBlog/{id}/reply', [ReplyController::class, 'destroy'])->name('IsslerBlog.reply.destroy');

require __DIR__ . '/auth.php';