<?php

namespace App\Repositories\Eloquent;

use App\DTOs\Posts\{NewPostDTO, UpdatePostDTO};
use App\Models\Post;
use App\Repositories\Interfaces\{PostRepositoryORMInterface, PaginationInterface};
use App\Repositories\Presenters\PaginationPresenter;
use stdClass;

class PostEloquentORM implements PostRepositoryORMInterface
{
    public function __construct(
        protected Post $model
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 10, ?string $filter = null): PaginationInterface
    {
        $result = $this->model->
                            where( function($query) use($filter) {
                                if ($filter)
                                {
                                    $query->where('title', 'like', "%{$filter}%")->
                                            orWhere('body', 'like', "%{$filter}%");
                                }
                            })->
                            paginate($totalPerPage, ['*'], 'page-' . $page, $page);
        
        return new PaginationPresenter($result);
    }

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
