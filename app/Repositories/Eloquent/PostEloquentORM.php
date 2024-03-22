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

    public function paginate(int $page = 1, int $totalPerPage = 10, ?string $filter = null, string $category = null): PaginationInterface
    {
        $result = $this->model->
                            where( function($query) use($filter, $category) {
                                if ($filter)
                                {
                                    $query->where('title', 'like', "%{$filter}%")->
                                            orWhere('body', 'like', "%{$filter}%");
                                }
                                if ($category)
                                {
                                    $query->where('category', "{$category}");
                                }
                            })->
                            orderBy('created_at', 'desc')->
                            paginate($totalPerPage, ['*'], 'page-' . $page, $page);
        
        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->
                            with('replies')->
                            where( function($query) use($filter) {
                                if ($filter)
                                {
                                    $query->where('title', 'like', "%{$filter}%")->
                                            orWhere('body', 'like', "%{$filter}%");
                                }
                            })->
                            orderBy('created_at', 'desc')->
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

    public function findOne(string $id): Post|null
    {
        $post = $this->model->
                            with(['replies' => function($query) {
                                $query->orderBy('created_at', 'desc');
                            }])->
                            find($id);

        return $post ? $post : null;
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
