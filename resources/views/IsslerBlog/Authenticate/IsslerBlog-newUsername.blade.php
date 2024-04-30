@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 698px;">
    <div class="wrapper">
        <form action="#" method="POST">
            @csrf
            <div class="text-center fs-1">
                <span class="border border-2 border-light rounded-circle px-3 py-2">
                    <i class="bi bi-person-fill-gear m-0"></i>
                </span>
            </div>
            <h1 class="text-center mt-4">Change Username</h1>
            <div class="mb-2 mt-4 input-group d-flex flex-wrap">
                <label for="current_username" class="form-label w-100 m-0">Current Username:</label>
                <input name="current_username" type="text" id="current_username" class="form-control" aria-label="current-username" value="{{ auth()->user()->username }}" disabled>
                <span class="input-group-text" id="current-username-input">
                    <i class="bi bi-person-fill"></i>
                </span>
            </div>

            <div class="mb-5 mt-4 input-group d-flex flex-wrap">
                <label for="new_username" class="form-label w-100 m-0">New Username:</label>
                <input name="new_username" type="text" id="new_username" class="form-control" aria-label="new-username-input">
                <span class="input-group-text" id="new-username-input">
                    <i class="bi bi-person-plus-fill"></i>
                </span>
            </div>
            @error('new_username')
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