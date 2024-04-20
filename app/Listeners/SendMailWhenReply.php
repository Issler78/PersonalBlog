<?php

namespace App\Listeners;

use App\Events\ReplyEvent;
use App\Mail\PostReplyRepliedMail;
use App\Models\Reply;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMailWhenReply
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReplyEvent $event): void
    {
        $reply = $event->reply();

        // To know who to send mail + If is a post or a reply
        try {
            if (!isset($reply->reply_id))
            {
                $email = env('MAIL_FROM_ADDRESS');
                $postOrReply = true;
            }
            else
            {
                $replyReplied = Reply::where('id', $reply->reply_id)->first();

                $email = $replyReplied->user->email;
                $postOrReply = false;
            }

            
        } catch (\Exception $e) {
            throw new \Exception("Error: $e");
        }

        Mail::to($email)->send(
            new PostReplyRepliedMail($reply, $postOrReply)
        );
    }
}
