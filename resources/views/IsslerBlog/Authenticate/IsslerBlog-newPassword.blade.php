@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 698px;">
    <div class="wrapper">
        <form action="{{ route('IsslerBlog.password.store') }}" method="POST">
            @csrf
            <div class="text-center fs-1">
                <span class="border border-2 border-light rounded-circle px-3 py-2">
                    <i class="bi bi-key-fill"></i>
                </span>
            </div>
            <h1 class="text-center mt-4">Reset Password</h1>

            @if (session()->has('invalid_link'))
                <div class="mt-4">
                    <span class="text-danger">{{ session('invalid_link') }}</span>
                </div>
            @endif

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-2 mt-4 input-group d-flex flex-wrap">
                <label for="email" class="form-label w-100 m-0">Email:</label>
                <input name="email" type="text" id="email" class="form-control" aria-label="email-input" value="{{ $email }}" disabled>
                <span class="input-group-text" id="email-input">
                    <i class="bi bi-person-fill"></i>
                </span>
            </div>

            <div class="mb-2 mt-4 input-group d-flex flex-wrap">
                <label for="password" class="form-label w-100 m-0">New Password:</label>
                <input name="password" type="password" id="password" class="form-control" aria-label="password-input">
                <span class="input-group-text" id="password-input">
                    <i class="bi bi-lock-fill"></i>
                </span>
            </div>
            @error('password')
                <span class="mt-0 text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-5 mt-4 input-group d-flex flex-wrap">
                <label for="password" class="form-label w-100 m-0">Confirm Password:</label>
                <input name="password_confirmation" type="password" id="password_confirmation" class="form-control" aria-label="confirm-password-input">
                <span class="input-group-text" id="confirm-password-input">
                    <i class="bi bi-lock-fill"></i>
                </span>
            </div>
            @error('password_confirmation')
                <span class="mt-0 text-danger">{{ $message }}</span>
            @enderror

            <div class="d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-md btn-outline-light">Save</button>
            </div>
        </form>
    </div>
</div>
<style>
    body {
        background-image: url('/img/wallpapers/authenticate-wallpaper.jpg');
        background-size: cover;
        background-position: 50% 30%;
        min-height: 100vh;
    }

    .wrapper {
        width: 440px;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 10px;
        color: white;
        padding: 35px 20px;
    }
</style>
@endsection