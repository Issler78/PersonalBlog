@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 698px;">
    <div class="wrapper">
        <form action="{{ route('IsslerBlog.login') }}" id="signin-form" method="POST">
            @csrf
            <h1 class="text-center">Sign In</h1>
            @if (session()->has('incorrect'))
                <span class="mt-0 text-danger">{{ session('incorrect') }}</span>
            @endif
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
            <div class="mb-2 mt-4 input-group d-flex flex-wrap">
                <label for="password" class="form-label w-100 m-0">Password:</label>
                <input name="password" type="password" id="password" class="form-control" aria-label="password-input">
                <span class="input-group-text" id="password-input">
                    <i class="bi bi-lock-fill"></i>
                </span>
            </div>
            @error('password')
                <span class="mt-0 text-danger">{{ $message }}</span>
            @enderror
            <div class="form-check d-flex justify-content-between mt-3 mb-5">
                <div>
                    <input class="form-check-input" name="remember" type="checkbox" value=1 id="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
                <a class="text-decoration-none" href="#">Forgot password?</a>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-md btn-outline-light">Sign In</button>
                <p class="m-0 text-end">Don't have an account?<br><a class="text-decoration-none switch-form" href="#">Register</a></p>
            </div>
        </form>
    



        <form action="{{ route('IsslerBlog.register') }}" id="signup-form" style="display: none;" method="POST">
            @csrf
            <h1 class="text-center">Sign Up</h1>
            <div class="mb-2 mt-4 input-group d-flex flex-wrap">
                <label for="username" class="form-label w-100 m-0">Username:</label>
                <input name="username" type="text" id="username" class="form-control" aria-label="username-input" placeholder="Min 3 Characters" value="{{ old('username') }}">
                <span class="input-group-text" id="username-input">
                    <i class="bi bi-person-fill"></i>
                </span>
            </div>
            @error('username')
                <span class="mt-0 text-danger">{{ $message }}</span>
            @enderror
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
            <div class="mb-2 mt-4 input-group d-flex flex-wrap">
                <label for="password" class="form-label w-100 m-0">Password:</label>
                <input name="password" type="password" id="password" class="form-control" aria-label="password-input" placeholder="Min 8 Characters">
                <span class="input-group-text" id="password-input">
                    <i class="bi bi-lock-fill"></i>
                </span>
            </div>
            @error('password')
                <span class="mt-0 text-danger">{{ $message }}</span>
            @enderror
            <div class="form-check d-flex justify-content-between mt-3 mb-5">
                <div>
                    <input class="form-check-input" name="remember" type="checkbox" value=1 id="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-md btn-outline-light">Sign Up</button>
                <p class="m-0 text-end">Already have an account?<br><a class="text-decoration-none switch-form" href="#">Sign In</a></p>
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
    
    a {
        color: #fff;
    }

    a:hover {
        box-shadow: 0px 2px #fff;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const signinForm = document.getElementById('signin-form');
        const signupForm = document.getElementById('signup-form');
        const switchLinks = document.querySelectorAll('.switch-form');

        switchLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                signinForm.style.display = (signinForm.style.display === 'none') ? 'block' : 'none';
                signupForm.style.display = (signupForm.style.display === 'none') ? 'block' : 'none';
            });
        });
    });
</script>
@endsection