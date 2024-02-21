<?php

namespace App\DTOs\Posts;

use App\Http\Requests\StoreUpdatePostRequest;

class NewPostDTO
{
    public function __construct(
        string $thumbnailName,
        string $title,
        string $category,
        string $body
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
