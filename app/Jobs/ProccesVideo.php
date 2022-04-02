<?php

namespace App\Jobs;

use App\Http\Livewire\Video\CreateVideo;
use App\Models\Channel;
use App\Models\Video;
use App\Services\VideoRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProccesVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Video $video, private Channel $channel)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(VideoRepository $repository)
    {
        Log::info('Video Created with uid' . $this->video->id . " on channel {$this->channel->id}");
    }
}
