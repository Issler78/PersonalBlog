@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
@php
    function addClasses($content)
    {
        $content = preg_replace('/<h(\d)(.*?)>(.*?)<\/h\1>/i', '<h$1 class="fw-bold mt-5">$3</h$1>', $content);
        $content = preg_replace('/<img(.*?)width\s*=\s*["\']?(\d+)?["\']?(.*?)>/i', '<img$1width="100%"$3 style="max-width: 1220px; min-width:900px">', $content);

        return $content;
    }

    $postBody = addClasses($post['body']);
@endphp
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
            <small class="text-body-secondary fs-6">{{ formatDate($post['created_at']) }}</small>
        </div>
        <h1 class="fw-bold text-light mb-3">{{ $post['title'] }}</h1>
        {!! html_entity_decode($postBody) !!}
    </div>
</div>
@endsection