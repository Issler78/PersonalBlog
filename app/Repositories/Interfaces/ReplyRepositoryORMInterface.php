<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Replies\NewReplyDTO;
use stdClass;

interface ReplyRepositoryORMInterface
{
    public function new(NewReplyDTO $dto): stdClass;
}
