<style>
    .countReplies:hover {
        color: #f8f9fa;
    }
</style>
<div>
    <h2 class="mt-4">Leave your Reply!</h2>
    @error('body')
        <span class="mt-2 text-danger">{{ $message }}</span>
    @enderror
    <form action="{{ route('IsslerBlog.reply.publish') }}" method="POST" class="mt-4">
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
<div class="mb-2">
    <x-messages></x-messages>
    <h2 class="mt-4">Look at the Others Replies!</h2>
    @forelse ($post->replies as $reply)
        @if (is_null($reply->reply_id))
            <div class="w-100 border border-2 border-secondary rounded p-3 my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <div class="rounded-circle bg-success d-flex justify-content-center align-items-center border border-black" style="width: 2rem; height: 2rem;">
                            <span>{{ getInitials($reply['user']['username']) }}</span>
                        </div>
                        <span class="text-body-secondary">{{ $reply['user']['username'] }}</span>
                    </div>
                    <small class="text-body-tertiary">{{ $reply['created_at'] }}</small>
                </div>
                <hr class="my-2 border-2 text-body-secondary">
                <div class="mx-2 mt-3 mb-2">
                    <span class="mb-3">{!! html_entity_decode( addStyles($reply['body']) ) !!}</span>
                    <div class="d-flex justify-content-between align-items-center mt-3" style="height: 37.6px">
                        @if (!$reply->childReplies->isEmpty())
                            <a class="text-secondary-emphasis text-decoration-none" style="display: block; cursor: pointer;" id="countReplies{{ $reply['id'] }}" onclick="changeContainerVisibility(<?php echo ($reply['id']); ?>, 'replies')">
                                <div class="d-flex align-items-center gap-2 countReplies">
                                    <i id="arrow-icon{{ $reply['id'] }}" class="bi bi-caret-down-fill"></i>{{ count($reply->childReplies) }} Reply(ies)
                                </div>
                            </a>
                        @else
                            <p class="text-secondary-emphasis m-0">No Replies</p>
                        @endif
                        <div class="d-flex gap-2">
                            <form id="btn-delete{{ $reply['id'] }}" action="{{ route('IsslerBlog.reply.destroy', ['id' => $reply['id']]) }}" method="POST" style="display: block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-lg btn-outline-danger ms-4" title="Delete Reply" style="padding: 3px 6px;"><i class="bi bi-trash3"></i></button>
                            </form>
                            <button type="button" id="btn-reply{{ $reply['id'] }}" style="display: block;" class="btn btn-md btn-outline-light" onclick="changeContainerVisibility(<?php echo ($reply['id']); ?>)">Reply</button>
                        </div>
                    </div>

                    <div id="container-reply{{ $reply['id'] }}" style="display: none;">
                        <hr>
                        <form action="{{ route('IsslerBlog.reply.publish') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="reply_id" value="{{ $reply['id'] }}">
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

                    <div id="container-replies{{ $reply['id'] }}" style="display: none; padding-left: 24px">

                        @foreach ($reply->childReplies as $childReply)
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <div class="rounded-circle bg-success d-flex justify-content-center align-items-center border border-black" style="width: 2rem; height: 2rem;">
                                        <span>{{ getInitials($childReply['user']['username']) }}</span>
                                    </div>
                                    <span class="text-body-secondary">{{ $childReply['user']['username'] }}</span>
                                </div>
                                <small class="text-body-tertiary">{{ $childReply['created_at'] }}</small>
                            </div>

                            <hr class="my-2 border-2 text-body-secondary">

                            <div class="mx-2 mt-3 mb-2">
                                <span class="mb-3">{!! html_entity_decode( addStyles($childReply['body']) ) !!}</span>
                                <div class="d-flex justify-content-end align-items-center mt-3" style="height: 37.6px">
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('IsslerBlog.reply.destroy', ['id' => $childReply['id'] ]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-lg btn-outline-danger ms-4" title="Delete Reply" style="padding: 3px 6px;"><i class="bi bi-trash3"></i></button>
                                        </form>
                                        <button type="button" style="display: block;" class="btn btn-md btn-outline-light" onclick="containerChildReply(<?php echo ($reply['id']); ?>, 'Username')">Reply</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>

                    <div id="child-replies-reply{{ $reply['id'] }}" style="display: none;">
                    <hr>
                        <form action="{{ route('IsslerBlog.reply.publish') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="reply_id" value="{{ $reply['id'] }}">
                            <div class="mb-3">
                                <label for="body" class="form-label">Your reply:</label>
                                <textarea name="body" id="body-child-reply{{ $reply['id'] }}"></textarea>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-md btn-outline-secondary" onclick="containerChildReply(<?php echo ($reply['id']); ?>, null)">Cancel</button>
                                <button type="submit" class="btn btn-md btn-outline-light">Reply</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endif
    @empty
        <p class="fs-5 mb-2">No replies posted😓</p>
    @endforelse
</div>
<script>
function containerChildReply(id, username)
{
    var container = document.getElementById("child-replies-reply" + id);
    var replyInput = tinymce.get('body-child-reply' + id);

    if (container.style.display === "none")
    {
        container.style.display = "block";
        replyInput.setContent('@' + username);
    }
    else
    {
        container.style.display = "none ";
    }
}

function changeContainerVisibility(id, container = 'reply')
{
    var countReplies = document.getElementById("countReplies" + id);
    var btnReply = document.getElementById("btn-reply" + id);
    var containerReply = document.getElementById("container-reply" + id);
    var btnDelete = document.getElementById("btn-delete" + id);
    var containerReplies = document.getElementById("container-replies" + id);
    var arrowIcon = document.getElementById("arrow-icon" + id);

    if (container === 'reply')
    {
        if (containerReply.style.display === "none") {
            containerReply.style.display = "block";
            btnReply.style.display = "none";
            countReplies.style.display = "none";
            btnDelete.style.display = "none";
        }
        else
        {
            containerReply.style.display = "none";
            btnReply.style.display = "block";
            countReplies.style.display = "block";
            btnDelete.style.display = "block";
        }
    }
    else
    {
        if (containerReplies.style.display === "none") {
            containerReplies.style.display = "block";
            containerReplies.style.margin = "10px 0px 0px";
            btnReply.style.display = "none";
            btnDelete.style.display = "none";
            arrowIcon.classList.remove("bi-caret-down-fill");
            arrowIcon.classList.add("bi-caret-up-fill");
        }
        else
        {
            containerReplies.style.display = "none";
            btnReply.style.display = "block";
            btnDelete.style.display = "block";
            arrowIcon.classList.remove("bi-caret-up-fill");
            arrowIcon.classList.add("bi-caret-down-fill");
        }
    }

}



tinymce.init({
    selector: '#body, textarea[id^="body-child-reply"]',
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