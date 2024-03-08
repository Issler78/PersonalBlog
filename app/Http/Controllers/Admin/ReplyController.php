<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateReplyRequest;

class ReplyController extends Controller
{
    public function store(StoreUpdateReplyRequest $request)
    {
        dd($request);
    }
}
