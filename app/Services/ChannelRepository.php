<?php

namespace App\Services;

use App\Events\ChannelUpdated;
use App\Exceptions\ImageNotStoredException;
use App\Http\Livewire\Channel\EditChannel;
use Faker\Core\File;
use Illuminate\Support\Facades\Storage;

class ChannelRepository
{
    public function saveChannel(EditChannel $channelDTO)
    {
        $channelDTO->authorize('update', $channelDTO->channel);
        $channelDTO->validate();
        $channelDTO->channel->save();
        try {
            $this->imageStore($channelDTO);
            session()->flash('message', 'Channel updated');
            ChannelUpdated::dispatch($channelDTO->channel);
        } catch (ImageNotStoredException $e) {
        }
        return redirect()->route('channel.edit', $channelDTO->channel->slug);
    }

    /**
     * @throws ImageNotStoredException
     */
    public function imageStore(EditChannel $channelDTO): void
    {
        if ($channelDTO->image) {
            $channelDTO->image->storeAs('photos', $channelDTO->channel->uid . '.png', 'public');
        } else {
            throw new ImageNotStoredException();
        }

    }
}
