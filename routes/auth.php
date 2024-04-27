<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Register User
Route::post('/IsslerBlog/auth/register', [RegisteredUserController::class, 'store'])->name('IsslerBlog.register');

// Forgot Password
Route::get('/IsslerBlog/forgot-password/request', [PasswordResetController::class, 'index'])->name('IsslerBlog.password.request');
Route::post('/IsslerBlog/forgot-password/request', [PasswordResetController::class, 'store'])->name('IsslerBlog.password.email');
Route::get('/IsslerBlog/reset-password/{token}', [NewPasswordController::class, 'index'])->name('IsslerBlog.password.reset');
Route::post('/IsslerBlog/reset-password', [NewPasswordController::class, 'store'])->name('IsslerBlog.password.store');

// Login
Route::post('/IsslerBlog/auth', [AuthSessionController::class, 'auth'])->name('IsslerBlog.login');

// Mail Code
Route::get('/IsslerBlog/verify/email', [VerifyEmailController::class, 'index'])->name('IsslerBlog.verify.send');
Route::post('/IsslerBlog/verify/email', [VerifyEmailController::class, 'verify'])->name('IsslerBlog.verify');
Route::get('/IsslerBlog/verify/email/{resend}/resend', [VerifyEmailController::class, 'index'])->name('IsslerBlog.verify.resend');

// Profile
Route::middleware('auth')->group(function () {
    Route::post('/IsslerBlog/logout', [AuthSessionController::class, 'logout'])->name('IsslerBlog.logout');
});