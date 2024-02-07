@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="bg-body-tertiary">
    <div class="container my-5">
        <h1 class="mb-4">Edit Post "{{ $post['title'] }}"</h1>
        <form action="{{ route('IsslerBlog.update', ['id' => $post['id']]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input name="title" type="text" id="title" class="form-control" value="{{ $post['title'] }}" placeholder="Example: Guide for future PHP Developers">
            </div>
            <div class="mb-5">
                <label for="category" class="form-label">Category:</label>
                <select name="category" id="category" class="form-select">
                    <option selected>Select the Category of the Post</option>
                    <option value="F" @if( $post['category'] == 'F' ) selected @endif>Front-End</option>
                    <option value="B" @if( $post['category'] == 'B' ) selected @endif>Back-End</option>
                    <option value="M" @if( $post['category'] == 'M' ) selected @endif>Mobile</option>
                    <option value="G" @if( $post['category'] == 'G' ) selected @endif>Guides</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Post Body:</label>
                <textarea name="body" id="body">{!! html_entity_decode($post['body']) !!}</textarea>
                <hr>
            </div>
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('IsslerBlog.index') }}" class="btn btn-md btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-md btn-outline-light">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    tinymce.init({
        selector: '#body',
        height: 600,
        plugins: [
            'table', 'emoticons', 'help', 'lists', 'preview', 'wordcount', 'charmap', 'visualblocks', 'visualchars', 'link', 'image'
        ],
        menubar: 'edit insert format table tools help',
        toolbar: 'undo redo | styles | fontsizeinput bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify outdent indent | bullist numlist | link image | preview',
        statusbar: false,
        entity_encoding: 'raw',
        skin: "oxide-dark",
        content_css: "dark",
        icons: "material",
        font_size_input_default_unit: "px",
        indentation: '16px'
    });
</script>
@endsection