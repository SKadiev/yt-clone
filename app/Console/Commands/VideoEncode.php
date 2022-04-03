<?php

namespace App\Console\Commands;


use FFMpeg\Format\Video\X264;
use Illuminate\Console\Command;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoEncode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video-encode-start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Video encode test';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $low = (new X264('aac'))->setKiloBitrate(500);
        $high = (new X264('aac'))->setKiloBitrate(1000);
        FFMpeg::fromDisk('videos')
            ->open('koL6ANvqz0woMty6o05i3v7pQWKqAld1qJG00QQB.mp4')
            ->exportForHLS()
            ->addFormat($low, function ($media) {
                $media->resize(640, 480);
            })
            ->addFormat($high, function ($media) {
                $media->resize(1280, 720);
            })->toDisk('videos')
            ->onProgress(function ($percentage) {
                $this->info("Progress $percentage");
            })
            ->save('/conversion/test.m3u8');

    }
}
