<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Register User
Route::post('/IsslerBlog/auth/register', [RegisteredUserController::class, 'store'])->name('IsslerBlog.register');

// Login
Route::post('/IsslerBlog/auth', [AuthSessionController::class, 'auth'])->name('IsslerBlog.login');

// Profile
Route::post('/IsslerBlog/logout', [AuthSessionController::class, 'logout'])->name('IsslerBlog.logout');