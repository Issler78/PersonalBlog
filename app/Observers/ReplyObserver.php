<?php

namespace App\Observers;

use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ReplyObserver
{
    /**
    * Handle the User "creating" event.
    */
    public function creating(Reply $reply): void
    {
        $reply->user_id = Auth::user()->id;
    }
}
