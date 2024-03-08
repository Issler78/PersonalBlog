<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateReplyRequest;
use App\Services\ReplyService;

class ReplyController extends Controller
{
    public function __construct(
        protected ReplyService $service
    ){}

    public function store(StoreUpdateReplyRequest $request)
    {
        $this->service->new();
    }
}
