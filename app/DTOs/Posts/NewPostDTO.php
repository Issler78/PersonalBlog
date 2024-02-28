<?php

namespace App\DTOs\Posts;

use App\Http\Requests\StoreUpdatePostRequest;

class NewPostDTO
{
    public function __construct(
        public string $thumbnail,
        public string $title,
        public string $category,
        public string $body
    ){}

    public static function makeFromRequest(StoreUpdatePostRequest $request): self
    {
        $thumbnailName = self::makeThumbnailName($request);

        return new self(
            $thumbnailName,
            $request->title,
            $request->category,
            $request->body
        );
    }

    private static function makeThumbnailName(StoreUpdatePostRequest $request)
    {
        if ($request->hasFile('thumbnail'))
        {    
            $thumbnail = $request->thumbnail;
    
            $thumbnailName = md5($thumbnail->getClientOriginalName() . strtotime("now")) . "." . $thumbnail->extension();
    
            $thumbnail->move(public_path('img/posts/thumbnails'), $thumbnailName);
        }

        return $thumbnailName;
    }
}
