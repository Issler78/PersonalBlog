<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Posts\NewPostDTO;
use App\DTOs\Posts\UpdatePostDTO;
use App\Models\Post;
use stdClass;

interface PostRepositoryORMInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null, string $category = null): PaginationInterface;

    public function getAll(string $filter = null): array;

    public function new(NewPostDTO $dto): stdClass;

    public function findOne(string $id): Post|null;

    public function update(UpdatePostDTO $dto): stdClass|null;

    public function delete(string $id): void;
}
