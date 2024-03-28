<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::post('/IsslerBlog/auth/register', [RegisteredUserController::class, 'store'])->name('IsslerBlog.register');