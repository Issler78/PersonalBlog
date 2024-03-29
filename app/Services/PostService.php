<?php

namespace App\Services;

use App\DTOs\Posts\{NewPostDTO, UpdatePostDTO};
use App\Contracts\{PostRepositoryORMInterface, PaginationInterface};
use stdClass;

class PostService
{
    public function __construct(
        protected PostRepositoryORMInterface $repository
    ){}

    public function paginate(int $page, int $totalPerPage = 10, string $filter = null, string $category = null): PaginationInterface
    {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
            category: $category
        );
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function new(NewPostDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function findOne(string $id)
    {
        return $this->repository->findOne($id);
    }

    public function update(UpdatePostDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}