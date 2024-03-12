<?php

namespace App\Services;

use App\DTOs\Replies\NewReplyDTO;
use App\Repositories\Eloquent\ReplyEloquentORM;

class ReplyService
{
    public function __construct(
        protected ReplyEloquentORM $repository
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