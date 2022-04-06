<?php

namespace App\Http\Livewire\Video;

use App\Enum\ChannelVisibility;
use App\Models\Channel;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class EditVideo extends Component
{
    public Video $video;
    public Channel $channel;
    public string $title;
    public string $description;
    public ChannelVisibility $visibility;
    public string $processing_percentage = 'aaaa';

    public function render()
    {
        return view('livewire.video.edit-video')
            ->extends('layouts.app');
    }

    protected function rules()
    {
        return [
            'video.title' => 'required|max:255',
            'video.description' => 'required|max:255',
            'video.visibility' => [new Enum(ChannelVisibility::class)],
        ];
    }

    public function save()
    {
        $this->validate();
        Cache::forget('channel_videos_' . $this->channel->slug);
        $this->video->save();

    }

    public function getProgress()
    {
        $this->processing_percentage = 'Progress: ' . $this->video->processing_percentage . '%';
    }
}
