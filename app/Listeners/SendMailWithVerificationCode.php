<?php

namespace App\Listeners;

use App\Events\VerifyEmailEvent;
use App\Mail\VerificationCodeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailWithVerificationCode
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
    public function handle(VerifyEmailEvent $event): void
    {
        $user = $event->user();

        $code = rand(100000, 999999);
        $user->verification_code = $code;

        Mail::to($user->email)->send(
            new VerificationCodeMail($user, $code)
        );
    }
}
