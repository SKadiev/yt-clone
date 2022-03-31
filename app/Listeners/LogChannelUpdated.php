<?php

namespace App\Listeners;

use App\Events\ChannelUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogChannelUpdated
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
     * @param  \App\Events\ChannelUpdated  $event
     * @return void
     */
    public function handle(ChannelUpdated $event)
    {
        Log::info("Channel updated with the name :" . $event->channel->name);
    }
}
