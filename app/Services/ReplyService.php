<?php

namespace App\Services;

use App\DTOs\Replies\NewReplyDTO;

class ReplyService
{
    public function new(NewReplyDTO $dto)
    {
        dd($dto);
    }
}