<style>
    .reply:hover {
        color: #f8f9fa;
    }
</style>
<div>
    <h2 class="mt-4">Leave your Comment!</h2>
    <form action="{{ route('IsslerBlog.reply.publish') }}" method="POST" class="mt-5">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post_id }}">
        <div class="mb-3">
            <label for="body" class="form-label">Your comment:</label>
            <textarea name="body" id="body"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-md btn-outline-light">Publish</button>
        </div>
    </form>
</div>
<hr class="border-3">
<div>
    <h2 class="mt-4">Look at the others comments!</h2>
    <div class="w-100 border border-2 border-secondary rounded p-3 my-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-center align-items-center gap-2">
                <div class="rounded-circle bg-success d-flex justify-content-center align-items-center border border-black" style="width: 2rem; height: 2rem;">
                    <span>MI</span>
                </div>
                <span class="text-body-secondary">Username</span>
            </div>
            <small class="text-body-tertiary">Mar 6th, 1:31 PM</small>
        </div>
        <hr class="my-2 border-2 text-body-secondary">
        <div class="mx-2 mt-3 mb-2">
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae tempora incidunt esse iste odit odio numquam blanditiis quidem officiis architecto aperiam iure perspiciatis culpa obcaecati ad dolor, perferendis voluptas enim earum placeat cum magnam nemo? Ea consequatur ratione, minus perferendis a eligendi dolore ad explicabo in neque consequuntur reprehenderit quas?</span>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <a class="text-secondary-emphasis text-decoration-none" href="#">
                    <div class="d-flex align-items-center gap-2 reply">
                        <i class="bi bi-caret-down-fill"></i>3 Replies
                    </div>
                </a>
                <button type="submit" class="btn btn-md btn-outline-light">Reply</button>
            </div>
        </div>
    </div>

    <div class="w-100 border border-2 border-secondary rounded p-3 my-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-center align-items-center gap-2">
                <div class="rounded-circle bg-success d-flex justify-content-center align-items-center border border-black" style="width: 2rem; height: 2rem;">
                    <span>MI</span>
                </div>
                <span class="text-body-secondary">Username</span>
            </div>
            <small class="text-body-tertiary">Mar 6th, 1:31 PM</small>
        </div>
        <hr class="my-2 border-2 text-body-secondary">
        <div class="mx-2 mt-3 mb-2">
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae tempora incidunt esse iste odit odio numquam blanditiis quidem officiis architecto aperiam iure perspiciatis culpa obcaecati ad dolor, perferendis voluptas enim earum placeat cum magnam nemo? Ea consequatur ratione, minus perferendis a eligendi dolore ad explicabo in neque consequuntur reprehenderit quas?</span>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <a class="text-secondary-emphasis text-decoration-none" href="#">
                    <div class="d-flex align-items-center gap-2 reply">
                        <i class="bi bi-caret-down-fill"></i>3 Replies
                    </div>
                </a>
                <button type="submit" class="btn btn-md btn-outline-light">Reply</button>
            </div>
        </div>
    </div>
</div>
<script>
tinymce.init({
    selector: '#body',
    height: 300,
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
</script>