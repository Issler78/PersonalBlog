<?php

namespace App\Repositories\Eloquent;

use App\DTOs\Replies\NewReplyDTO;
use App\Repositories\Interfaces\ReplyRepositoryORMInterface;
use stdClass;

class ReplyEloquentORM implements ReplyRepositoryORMInterface
{
    public function new(NewReplyDTO $dto): stdClass
    {
        return new stdClass;
    }
}
