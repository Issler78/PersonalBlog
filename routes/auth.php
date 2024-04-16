<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Register User
Route::post('/IsslerBlog/auth/register', [RegisteredUserController::class, 'store'])->name('IsslerBlog.register');

// Forgot Password
Route::get('/IsslerBlog/forgot-password/request', [PasswordResetController::class, 'index'])->name('IsslerBlog.password.request');

// Login
Route::post('/IsslerBlog/auth', [AuthSessionController::class, 'auth'])->name('IsslerBlog.login');

// Profile
Route::middleware('auth')->group(function () {
    Route::post('/IsslerBlog/logout', [AuthSessionController::class, 'logout'])->name('IsslerBlog.logout');

    Route::get('/IsslerBlog/verify/email', [VerifyEmailController::class, 'index'])->name('IsslerBlog.verify.send');
    Route::post('/IsslerBlog/verify/email', [VerifyEmailController::class, 'verify'])->name('IsslerBlog.verify');
    Route::get('/IsslerBlog/verify/email/{resend}/resend', [VerifyEmailController::class, 'index'])->name('IsslerBlog.verify.resend');
});