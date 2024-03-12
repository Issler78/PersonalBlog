<?php

namespace App\Repositories\Eloquent;

use App\DTOs\Replies\NewReplyDTO;
use App\Models\Reply;
use App\Repositories\Interfaces\ReplyRepositoryORMInterface;
use stdClass;

class ReplyEloquentORM implements ReplyRepositoryORMInterface
{
    public function __construct(
        protected Reply $model
    ){}

    public function new(NewReplyDTO $dto): stdClass
    {
        $reply = $this->model->create(
            (array) $dto
        );

        return (object) $reply->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}
