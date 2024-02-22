<?php

namespace App\DTOs\Posts;

use App\Http\Requests\StoreUpdatePostRequest;

class UpdatePostDTO
{
    public function __construct(
        public string $id,
        public string $thumbanail,
        public string $title,
        public string $category,
        public string $body
    ){}

    public static function makeFromRequest(StoreUpdatePostRequest $request, string $thumbnailName): self
    {
        return new self(
            $request->id,
            $thumbnailName,
            $request->title,
            $request->category,
            $request->body
        );
    }
}
