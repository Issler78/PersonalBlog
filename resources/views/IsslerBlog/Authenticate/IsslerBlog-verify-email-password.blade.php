@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 698px;">
    <div class="wrapper">
        <div class="text-center fs-1">
            <span class="border border-2 border-light rounded-circle px-3 py-2"><i class="bi bi-envelope-check-fill"></i></span>
        </div>
        <h1 class="text-center my-3">Verify your Email</h1>
        <p>We have sent a link to reset your password to the <b>{{ $email }}</b> email.</p>
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
        width: 560px;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 10px;
        color: white;
        padding: 35px 20px;
    }
</style>
@endsection