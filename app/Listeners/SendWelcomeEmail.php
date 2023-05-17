<?php

namespace App\Listeners;

use App\Events\ClientWelcome;
use App\Mail\ClientWelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


    public function handle(ClientWelcome $event): void
    {
        $client = $event->client;
        Mail::to($client->email)->send(new ClientWelcomeEmail($client));
    }
}
