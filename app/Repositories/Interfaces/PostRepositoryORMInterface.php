<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Posts\NewPostDTO;
use App\DTOs\Posts\UpdatePostDTO;
use stdClass;

interface PostRepositoryORMInterface
{
    public function getAll(string $filter = null): array;

    public function new(NewPostDTO $dto): stdClass;

    public function findOne(string $id): stdClass|null;

    public function update(UpdatePostDTO $dto): stdClass|null;

    public function delete(string $id): void;
}
