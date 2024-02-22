<?php

namespace App\DTOs\Posts;

use App\Http\Requests\StoreUpdatePostRequest;

class NewPostDTO
{
    public function __construct(
        public string $thumbnailName,
        public string $title,
        public string $category,
        public string $body
    ){}

    public static function makeFromRequest(StoreUpdatePostRequest $request, string $thumbnailName): self
    {
        return new self(
            $thumbnailName,
            $request->title,
            $request->category,
            $request->body
        );
    }
}
