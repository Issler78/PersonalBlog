<?php

namespace App\Services;

use App\DTOs\Replies\NewReplyDTO;
use App\Repositories\Interfaces\ReplyRepositoryORMInterface;

class ReplyService
{
    public function __construct(
        protected ReplyRepositoryORMInterface $repository
    ){}

    public function new(NewReplyDTO $dto)
    {
        return $this->repository->new($dto);
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }
}