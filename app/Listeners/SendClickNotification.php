<?php

namespace App\Listeners;

use App\Events\ClickEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

use App\Mail\ClientClickedEmail;

class SendClickNotification
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
    public function handle(ClickEvent $event): void
    {
         $click = $event->click;
         Mail::to($click->client->email)->send(new ClientClickedEmail($click) );
    }
}
