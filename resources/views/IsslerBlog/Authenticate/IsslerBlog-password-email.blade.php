@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 698px;">
    <div class="wrapper">
        <form action="#" method="POST">
            @csrf
            <div class="text-center fs-1">
                <span class="border border-2 border-light rounded-circle px-3 py-2">
                    <i class="bi bi-lock-fill"></i>
                </span>
            </div>
            <h1 class="text-center fs-2 mt-4">Forgot your Password?</h1>
            <p class="mt-4">Enter your email and we'll send you a link to log back into your account.</p>
            <div class="mb-2 mt-4 input-group d-flex flex-wrap">
                <label for="email" class="form-label w-100 m-0">Email:</label>
                <input name="email" type="text" id="email" class="form-control" aria-label="email-input" placeholder="name@example.com" value="{{ old('email') }}">
                <span class="input-group-text" id="email-input">
                    <i class="bi bi-person-fill"></i>
                </span>
            </div>
            @error('email')
                <span class="mt-0 text-danger">{{ $message }}</span>
            @enderror

            <div class="d-flex justify-content-end align-items-center mt-5">
                <button type="submit" class="btn btn-md btn-outline-light">Send</button>
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
        width: 460px;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 10px;
        color: white;
        padding: 35px 20px;
    }
</style>
@endsection