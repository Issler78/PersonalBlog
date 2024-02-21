<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\PostRepositoryORMInterface;
use stdClass;

class PostEloquentORM implements PostRepositoryORMInterface
{
    public function getAll(string $filter = null): array
    {
        
    }

    public function new(NewPostDTO $dto): stdClass
    {
        
    }

    public function findOne(string $id): stdClass|null
    {
        
    }

    public function update(UpdatePostDTO $dto): stdClass|null
    {
        
    }

    public function delete(string $id): void
    {

    }
}
