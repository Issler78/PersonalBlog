<?php

namespace App\DTOs\Posts;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;

class UpdatePostDTO
{
    public function __construct(
        public string $id,
        public string $thumbanail,
        public string $title,
        public string $category,
        public string $body
    ){}

    public static function makeFromRequest(StoreUpdatePostRequest $request): self
    {
        $thumbnailName = self::makeThumbnailName($request, Post::findOrFail($request->id));

        return new self(
            $request->id,
            $thumbnailName,
            $request->title,
            $request->category,
            $request->body
        );
    }

    private static function makeThumbnailName(StoreUpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('thumbnail'))
        {
            $thumbnail = $request->thumbnail;
    
            $thumbnailName = md5($thumbnail->getClientOriginalName() . strtotime("now") . "." . $thumbnail->extension());

            $thumbnail->move(public_path('img/posts/thumbnails'), $thumbnailName);
            unlink(public_path('img/posts/thumbnails/' . $post->thumbnail));
        }
        else
        {
            $thumbnailName = $post->thumbnail;
        }

        return $thumbnailName;
    }
}
