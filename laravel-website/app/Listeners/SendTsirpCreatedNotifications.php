<?php

namespace App\Listeners;

use App\Events\TsirpCreated;
use App\Models\User;
use App\Notifications\NewTsirp;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTsirpCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param TsirpCreated $event
     * @return void
     */
    public function handle(TsirpCreated $event)
    {
        //
        foreach (User::whereNot('id', $event->tsirp->user_id)->cursor() as $user) {
            $user->notify(new NewTsirp($event->tsirp));
        }
    }
}
