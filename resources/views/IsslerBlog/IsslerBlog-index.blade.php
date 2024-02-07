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
            @foreach ($posts as $post)
                <div class="col">
                    <a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">
                        <h2>{{ $post['title'] }}</h2>
                    </a>
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="320" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#55595c"></rect>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                        <span 
                            class="card-text mb-3 fs-6" 
                            style="
                                overflow: hidden; 
                                text-overflow: ellipsis;
                                display:   
                                    -webkit-box;
                                    -webkit-line-clamp: 3;
                                    -webkit-box-orient: vertical;
                                height: 72px; 
                                width: 100%;
                            "
                        >
                            {!! strip_tags(html_entity_decode($post['body'])) !!}
                        </span>
                            <div class="d-flex justify-content-between mb-4">
                                <a href="#" class="btn btn-outline-secondary rounded-0" style="font-size: 14px; padding: 3px 6px;">
                                    {{ $post['category'] }}
                                </a>
                                <a href="{{ route('IsslerBlog.edit', ['id' => $post['id']]) }}" title="Edit Post" class="btn btn-outline-danger rounded-0" style="font-size: 14px; padding: 3px 6px;">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </div>
                                                
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" title="Read More" class="btn btn-lg btn-outline-light px-5">
                                    <i class="bi bi-book-half"></i> Read More
                                </a>
                                <small class="text-body-secondary fs-6">{{ $post['created_at'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection