@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="bg-body-tertiary">
    <div class="container my-5">
        <h1 class="mb-4">Publish New Post</h1>
        <form action="{{ route('IsslerBlog.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input name="title" type="text" id="title" class="form-control" placeholder="Example: How to create a Successful Youtube Channel?">
            </div>
            <div class="mb-5">
                <label for="category" class="form-label">Category:</label>
                <select name="category" id="category" class="form-select">
                    <option selected>Select the Category of the Post</option>
                    <option value="F">Front-End</option>
                    <option value="B">Back-End</option>
                    <option value="M">Mobile</option>
                    <option value="G">Guides</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Post Body:</label>
                <textarea name="body" id="body"></textarea>
                <hr>
            </div>
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('IsslerBlog.index') }}" class="btn btn-md btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-md btn-outline-light">Publish</button>
            </div>
        </form>
    </div>
</div>
<script>
    tinymce.init({
        selector: '#post_body',
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