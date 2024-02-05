@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<style>
    .container {
        max-width: 820px;
        min-width: 260px;
    }
</style>
<div class="bg-body-tertiary">
    <div class="container my-5">
        <a href="{{ route('IsslerBlog.publish') }}" title="Add Post" class="btn btn-md btn-outline-light mb-3">
            <i class="bi bi-plus-lg"></i> Add Post
        </a>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-5">
            <div class="col">
                <a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">
                    <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                </a>
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="320" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text mb-3 fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum veniam voluptates at libero modi cumque nulla, itaque quis vero laborum quidem pariatur...
                        </p>
                        <div class="d-flex justify-content-between mb-4">
                            <a href="#" class="btn btn-outline-secondary rounded-0" style="font-size: 14px; padding: 3px 6px;">
                                Category
                            </a>
                            <a href="#" title="Edit Post" class="btn btn-outline-danger rounded-0" style="font-size: 14px; padding: 3px 6px;">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </div>
                                            
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" title="Read More" class="btn btn-lg btn-outline-light px-5">
                                <i class="bi bi-book-half"></i> Read More
                            </a>
                            <small class="text-body-secondary fs-6">01/02/2024 10:00</small>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col">
                <a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">
                    <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                </a>
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="320" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text mb-3 fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum veniam voluptates at libero modi cumque nulla, itaque quis vero laborum quidem pariatur...
                        </p>
                        <div class="d-flex justify-content-between mb-4">
                            <a href="#" class="btn btn-outline-secondary rounded-0" style="font-size: 14px; padding: 3px 6px;">
                                Category
                            </a>
                            <a href="#" title="Edit Post" class="btn btn-outline-danger rounded-0" style="font-size: 14px; padding: 3px 6px;">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </div>
                                            
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" title="Read More" class="btn btn-lg btn-outline-light px-5">
                                <i class="bi bi-book-half"></i> Read More
                            </a>
                            <small class="text-body-secondary fs-6">01/02/2024 10:00</small>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection