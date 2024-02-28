<?php

namespace App\Repositories\Eloquent;

use App\DTOs\Posts\NewPostDTO;
use App\DTOs\Posts\UpdatePostDTO;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryORMInterface;
use stdClass;

class PostEloquentORM implements PostRepositoryORMInterface
{
    public function __construct(
        protected Post $model
    ){}

    public function getAll(string $filter = null): array
    {
        return $this->model->
                            where( function($query) use($filter) {
                                if ($filter)
                                {
                                    $query->where('title', 'like', "%{$filter}%")->
                                            orWhere('body', 'like', "%{$filter}%");
                                }
                            })->
                            get()->
                            toArray();
    }

    public function new(NewPostDTO $dto): stdClass
    {
        $post = $this->model->create(
            (array) $dto
        );

        return (object) $post->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $post = $this->model->find($id);
        if (!$post)
        {
            return null;
        }

        return (object) $post->toArray();
    }

    public function update(UpdatePostDTO $dto): stdClass|null
    {
        if (!$post = $this->model->find($dto->id))
        {
            return null;
        }
        
        $post->update(
            (array) $dto
        );

        return (object) $post->toArray(); 
    }

    public function delete(string $id): void
    {
        $post = $this->model->findOrFail($id);

        unlink(public_path('/img/posts/thumbnails/' . $post->thumbnail));

        $post->delete();
    }
}
