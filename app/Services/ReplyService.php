<?php

namespace App\Services;

use App\DTOs\Replies\NewReplyDTO;
use App\Contracts\ReplyRepositoryORMInterface;
use App\Events\ReplyEvent;

class ReplyService
{
    public function __construct(
        protected ReplyRepositoryORMInterface $repository
    ){}

    public function new(NewReplyDTO $dto)
    {
        $reply = $this->repository->new($dto);

        ReplyEvent::dispatch($reply);

        return $reply;
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }
}