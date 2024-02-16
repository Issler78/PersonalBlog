@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<style>
    .container {
        max-width: 1220px;
        min-width: 260px;
    }
</style>
<div class="bg-body-tertiary">
    <div class="container mx-auto my-5">
        <div class="d-flex justify-content-start align-items-center gap-4 mb-3">
            <a href="#" class="btn btn-outline-secondary rounded-0" style="font-size: 14px; padding: 3px 6px;">
                {{ getCategoryValue($post['category']) }}
            </a>
            <small class="text-body-secondary fs-6">{{ dateFormat($post['created_at']) }}</small>
        </div>
        <h1 class="fw-bold text-light mb-3">{{ $post['title'] }}</h1>
        {!! html_entity_decode( addStyles($post['body']) ) !!}
    </div>
</div>
@endsection