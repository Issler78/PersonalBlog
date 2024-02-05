@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="bg-body-tertiary">
    <div class="container my-5">
        <h1 class="mb-4">Publish New Post</h1>
        <form action="#" method="POST">
            <div class="mb-3">
                <label for="InputTitle" class="form-label">Title:</label>
                <input type="text" id="InputTitle" class="form-control" placeholder="Example: How to create a Successful Youtube Channel?">
            </div>
            <div class="mb-5">
                <label for="SelectCategory" class="form-label">Category:</label>
                <select id="SelectCategory" class="form-select">
                    <option selected>Select the Category of the Post</option>
                    <option value="#">Front-End</option>
                    <option value="#">Back-End</option>
                    <option value="#">Mobile</option>
                    <option value="#">Guides</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="#" class="form-label">Post Body:</label>
                <textarea id="PostBody"></textarea>
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
        selector: '#PostBody',
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