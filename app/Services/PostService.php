<?php

namespace App\Services;

use App\DTOs\Posts\{NewPostDTO, UpdatePostDTO};
use App\Repositories\Interfaces\{PostRepositoryORMInterface, PaginationInterface};
use stdClass;

class PostService
{
    public function __construct(
        protected PostRepositoryORMInterface $repository
    ){}

    public function paginate(int $page, int $totalPerPage = 10, int $filter = null): PaginationInterface
    {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter
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

    public function findOne(string $id): stdClass|null
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