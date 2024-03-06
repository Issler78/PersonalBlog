@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="bg-body-tertiary">
    <div class="container my-5" style="max-width: 820px; min-width: 260px;">
        @if (!empty($posts->items()))
            <a href="{{ route('IsslerBlog.publish') }}" title="Add Post" class="btn btn-md btn-outline-light mb-3">
                <i class="bi bi-plus-lg"></i> Add Post
            </a>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-5">
                @foreach ($posts->items() as $post)
                    <div class="col">
                        <a href="{{ route('IsslerBlog.show', ['id' => $post['id']]) }}" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">
                            <h2 class="fw-bold">{{ $post['title'] }}</h2>
                        </a>
                        <div class="card shadow-sm">
                            <img src="/img/posts/thumbnails/{{ $post['thumbnail'] }}" title="Thumbnail" alt="Thumbnail" width="794px" height="400px">
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
                                        {{ getCategoryValue($post['category']) }}
                                    </a>
                                    <a href="{{ route('IsslerBlog.edit', ['id' => $post['id']]) }}" title="Edit Post" class="btn btn-outline-danger rounded-0" style="font-size: 14px; padding: 3px 6px;">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                </div>
                                                    
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('IsslerBlog.show', ['id' => $post['id']]) }}" title="Read More" class="btn btn-lg btn-outline-light px-5">
                                        <i class="bi bi-book-half"></i> Read More
                                    </a>
                                    <small class="text-body-secondary fs-6">{{ dateFormat($post['created_at']) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

            <x-pagination :paginator="$posts" :appends="$filters"/>

        @else
            @php
                $result = $filters['filter'] == '' ? "No posts found" : "No posts found with this search filter";
                $link = $result == "No posts found" ? true : false;
            @endphp
            <div class="d-flex flex-column align-items-center">
                <p class="fw-semibold fs-2 mb-2">{{ $result }}😓</p>
                @if ($link)
                    <p>Click <a href="{{ route('IsslerBlog.publish') }}" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover fw-semibold">here</a> to make a post</p>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection