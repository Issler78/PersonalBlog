<?php

namespace App\DTOs\Posts;

use App\Http\Requests\StoreUpdatePostRequest;

class UpdatePostDTO
{
    public function __construct(
        string $id,
        string $thumbanailName,
        string $title,
        string $category,
        string $body
    ){}

    public static function makeFromRequest(StoreUpdatePostRequest $request, string $id, string $thumbnailName): self
    {
        return new self(
            $id,
            $thumbnailName,
            $request->title,
            $request->category,
            $request->body
        );
    }
}
