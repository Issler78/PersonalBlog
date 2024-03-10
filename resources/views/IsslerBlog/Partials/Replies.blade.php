<style>
    .countReplies:hover {
        color: #f8f9fa;
    }
</style>
<div>
    <h2 class="mt-4">Leave your Reply!</h2>
    <form action="{{ route('IsslerBlog.reply.publish') }}" method="POST" class="mt-5">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="mb-3">
            <label for="body" class="form-label">Your reply:</label>
            <textarea name="body" id="body"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-md btn-outline-light">Publish</button>
        </div>
    </form>
</div>
<hr class="border-3">
<div>
    <h2 class="mt-4">Look at the Others Replies!</h2>
    @forelse ($post->replies as $reply)
        <div class="w-100 border border-2 border-secondary rounded p-3 my-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <div class="rounded-circle bg-success d-flex justify-content-center align-items-center border border-black" style="width: 2rem; height: 2rem;">
                        <span>MI</span>
                    </div>
                    <span class="text-body-secondary">Username</span>
                </div>
                <small class="text-body-tertiary">{{ dateFormat($reply['created_at']) }}</small>
            </div>
            <hr class="my-2 border-2 text-body-secondary">
            <div class="mx-2 mt-3 mb-2">
                <span class="mb-3">{!! html_entity_decode( addStyles($reply['body']) ) !!}</span>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a class="text-secondary-emphasis text-decoration-none" style="display: block;" id="countReplies{{ $reply['id'] }}" href="#">
                        <div class="d-flex align-items-center gap-2 countReplies">
                            <i class="bi bi-caret-down-fill"></i>3 Replies
                        </div>
                    </a>
                    <button type="button" id="btn-reply{{ $reply['id'] }}" style="display: block;" class="btn btn-md btn-outline-light" onclick="changeContainerVisibility(<?php echo ($reply['id']); ?>)">Reply</button>
                </div>

                <div id="container{{ $reply['id'] }}" style="display: none;">
                    <hr>
                    <form action="{{ route('IsslerBlog.reply.publish') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="mb-3">
                            <label for="body" class="form-label">Your reply:</label>
                            <textarea name="body" id="body"></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-md btn-outline-secondary" onclick="changeContainerVisibility(<?php echo ($reply['id']); ?>)">Cancel</button>
                            <button type="submit" class="btn btn-md btn-outline-light">Reply</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @empty
        <p class="fs-5 mb-2">No replies posted😓</p>
    @endforelse
</div>
<script>
function changeContainerVisibility(id)
{
    var countReplies = document.getElementById("countReplies" + id);
    var btnReply = document.getElementById("btn-reply" + id);
    var container = document.getElementById("container" + id);
    if (container.style.display === "none")
    {
        container.style.display = "block";
        btnReply.style.display = "none";
        countReplies.style.display = "none";
    }
    else
    {
        container.style.display = "none";
        btnReply.style.display = "block";
        countReplies.style.display = "block";
    }
}



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