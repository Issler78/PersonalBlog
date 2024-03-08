<?php

namespace App\DTOs\Replies;

use App\Http\Requests\StoreUpdateReplyRequest;

class NewReplyDTO
{
    public function __construct(
        public string $body,
        public string $post_id
    ){}

    public static function makeFromRequest(StoreUpdateReplyRequest $request): self
    {
        return new self(
            $request->body,
            $request->post_id
        );
    }
}
