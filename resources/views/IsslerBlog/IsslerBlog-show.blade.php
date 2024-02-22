@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="bg-body-tertiary">
    <img src="/img/posts/thumbnails/{{ $post->thumbnail }}" style="width: 100%; max-height: 670px; height: auto;" alt="Thumbnail" title="Thumbnail" class="img-fluid thumbnail">
    <div class="container mx-auto my-5" style="max-width: 1220px; min-width: 260px">
        <div class="d-flex justify-content-start align-items-center gap-4 mb-3">
            <a href="#" class="btn btn-outline-secondary rounded-0" style="font-size: 14px; padding: 3px 6px;">
                {{ getCategoryValue($post->category) }}
            </a>
            <small class="text-body-secondary fs-6">{{ dateFormat($post->created_at) }}</small>
        </div>
        <h1 class="fw-bold text-light mb-3">{{ $post->title }}</h1>
        {!! html_entity_decode( addStyles($post->body) ) !!}
    </div>
</div>
@endsection