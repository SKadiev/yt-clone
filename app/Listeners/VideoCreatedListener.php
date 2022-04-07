<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\CreateThumbnailFromVideo;
use App\Jobs\ProccesVideo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class VideoCreatedListener
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
     * @param  \App\Events\VideoCreated  $event
     * @return void
     */

    public function handle(VideoCreated $event)
    {
//        ProccesVideo::dispatch($event->video, $event->channel);
        ConvertVideoForStreaming::dispatch($event->video)->onQueue('default');
        CreateThumbnailFromVideo::dispatch($event->video);
    }
}
