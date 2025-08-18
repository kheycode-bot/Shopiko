<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVerificationEmailOnLogin
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
    public function handle(Login $event) 
    {
        // Check if the user is not verified
        if (!$event->user->hasVerifiedEmail())
        {
            // Send the email verification notification
            $event->user->sendEmailVerificationNotification();
        }
}
}