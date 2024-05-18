<?php

namespace App\Listeners;

use App\Events\ReplyEvent;
use App\Mail\PostReplyRepliedMail;
use App\Models\Reply;
use App\Models\User;
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
        $userReply = $reply->user;

        // To know who to send mail + If is a post or a reply
        try {
            if (!isset($reply->reply_id))
            {
                $email = env('MAIL_FROM_ADDRESS');
                $postOrReply = true;
                $usernameToMail = env('MAIL_FROM_NAME');
            }
            else
            {
                $parentReply = Reply::where('id', $reply->reply_id)->first();

                preg_match('~<p><span style="color: #007bff;">@(\w+)</span>~', $reply->body, $matches);
                if (!empty($matches))
                {
                    $username = $matches[1];
                    $user = User::where('username', $username)->first();

                    if ($user)
                    {
                        $email = $user->email;
                        $usernameToMail = $user->username;
                    }
                    else
                    {
                        $email = $parentReply->user->email;
                        $usernameToMail = $parentReply->user->username;
                    }
                }
                else
                {
                    $email = $parentReply->user->email;
                    $usernameToMail = $parentReply->user->username;
                }

                $postOrReply = false;
            }

            
        } catch (\Exception $e) {
            throw new \Exception("Error: $e");
        }

        Mail::to($email)->send(
            new PostReplyRepliedMail($reply, $userReply, $postOrReply, $usernameToMail)
        );
    }
}
