@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<style>
    .thumbnail {
        width: 400px;
        aspect-ratio: 16/9;
        background: #212529;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px dashed #495057;
        cursor: pointer;
        font-family: sans-serif;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;
    }

    .thumbnail:hover,
    .thumbnail:focus {
        background: #374045;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    #thumbnail-img {
        max-width: 100%;
    }
</style>
<div class="bg-body-tertiary">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-4">Edit Post "{{ $post['title'] }}"</h1>
            <form action="{{ route('IsslerBlog.destroy', ['id' => $post['id']]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg btn-outline-danger ms-4" title="Delete Post" style="padding: 3px 6px;"><i class="bi bi-trash3"></i></button>
            </form>
        </div>
        <form action="{{ route('IsslerBlog.update', ['id' => $post['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 d-flex flex-wrap">
                <div class="me-lg-3 mb-4">
                    <label for="thumbnailInput" class="form-label">Thumbnail:</label>
                    <label class="thumbnail text-secondary" for="thumbnailInput">
                        <span id="thumbnail-img"></span>
                    </label>
                    <input type="file" name="thumbnail" id="thumbnailInput" class="d-none">
                </div>
                <div>
                    <p class="form-label">Current Thumbnail:</p>
                    <img src="/img/posts/thumbnails/{{ $post['thumbnail'] }}" alt="Current Thumbnail" style="background-size: contain;" width="400" height="225">
                </div>
            </div>
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
    skin: 'oxide-dark',
    content_css: 'dark',
    icons: 'material',
    font_size_input_default_unit: 'px',
    font_family_formats: 'JetBrains Mono ;Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
    font_size_formats: '16px 18px 20px 22px 24px 26px 28px 30px 32px',
    content_style: ".mce-content-body {font-size:16px; font-family: 'JetBrains Mono', monospace, Arial, sans-serif;} img {max-width: 100%;}",
});

const inputFile = document.querySelector("#thumbnailInput");
const ThumbnailImage = document.querySelector("#thumbnail-img");
const ThumbnailText = "Choose a Thumbnail";

ThumbnailImage.innerHTML = ThumbnailText;

inputFile.addEventListener("change", function (e) {
const inputTarget = e.target;
const file = inputTarget.files[0];

if (file) 
{
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
    const readerTarget = e.target;

    const img = document.createElement("img");
    img.src = readerTarget.result;
    img.classList.add("thumbnail-img");

    ThumbnailImage.innerHTML = "";
    ThumbnailImage.appendChild(img);
    });

    reader.readAsDataURL(file);
}
else
{
    ThumbnailImage.innerHTML = "Choose a Thumbnail";
}
});
</script>
@endsection