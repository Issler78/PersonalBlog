<?php

namespace App\Services;

use App\DTOs\Replies\NewReplyDTO;
use App\Contracts\ReplyRepositoryORMInterface;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::denies('owner', $id))
        {
            abort(401, 'Unauthorized');
        }

        $this->repository->delete($id);
    }
}