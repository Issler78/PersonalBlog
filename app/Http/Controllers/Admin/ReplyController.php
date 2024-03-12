<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\Replies\NewReplyDTO;
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
        $this->service->new(NewReplyDTO::makeFromRequest($request));

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->back();
    }
}
