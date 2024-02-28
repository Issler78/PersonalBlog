@php
    $oldCategory = old('category');
@endphp
<div class="mb-3 d-flex flex-wrap">
    <div class="me-lg-3 mb-4">
        <label for="thumbnailInput" class="form-label">Thumbnail:</label>
        <label class="thumbnail text-secondary" for="thumbnailInput">
            <span id="thumbnail-img"></span>
        </label>
        <input type="file" name="thumbnail" id="thumbnailInput" class="d-none">
    </div>
    
    @isset($method)
        @if ($method === "PUT")
            <div>
                <p class="form-label">Current Thumbnail:</p>
                <img src="/img/posts/thumbnails/{{ $post->thumbnail }}" title="Current Thumbnail" alt="Current Thumbnail" style="background-size: contain;" width="400" height="225">
            </div>
        @endif
    @endisset

    @error('thumbnail')
        <span class="mt-2 text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Example: Guide for future PHP Developers" value="{{ $post->title ?? old('title') }}">
    @error('title')
        <span class="mt-2 text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-5">
    <label for="category" class="form-label">Category:</label>
    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
        <option selected>Select the Category of the Post</option>
        <option
            @isset($post)
                @isset($oldCategory)
                    {{ $oldCategory == "F" ? "selected" : "" }}
                @else
                   {{ $post->category == "F" ? "selected" : ""}}
                @endisset
            @else
                {{ $oldCategory == "F" ? "selected" : "" }}
            @endisset
            value="F">
            Front-End
        </option>
        <option
            @isset($post)
                @isset($oldCategory)
                    {{ $oldCategory == "B" ? "selected" : "" }}
                @else
                   {{ $post->category == "B" ? "selected" : ""}}
                @endisset
            @else
                {{ $oldCategory == "B" ? "selected" : "" }}
            @endisset
            value="B">
            Back-End
        </option>
        <option
            @isset($post)
                @isset($oldCategory)
                    {{ $oldCategory == "M" ? "selected" : "" }}
                @else
                   {{ $post->category == "M" ? "selected" : ""}}
                @endisset
            @else
                {{ $oldCategory == "M" ? "selected" : "" }}
            @endisset
            value="M">
            Mobile
        </option>
        <option
            @isset($post)
                @isset($oldCategory)
                    {{ $oldCategory == "G" ? "selected" : "" }}
                @else
                   {{ $post->category == "G" ? "selected" : ""}}
                @endisset
            @else
                {{ $oldCategory == "G" ? "selected" : "" }}
            @endisset
            value="G">
            Guides
        </option>
    </select>
    @error('category')
        <span class="mt-2 text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="body" class="form-label">Post Body:</label>
    <textarea name="body" id="body">{{ $post->body ?? old('body') }}</textarea>
    @error('body')
        <span class="mt-2 text-danger">{{ $message }}</span>
    @enderror
    <hr>
</div>
<div class="d-flex justify-content-end gap-3">
    <a href="{{ route('IsslerBlog.index') }}" class="btn btn-md btn-outline-secondary">Cancel</a>
    <button type="submit" class="btn btn-md btn-outline-light">Publish</button>
</div>