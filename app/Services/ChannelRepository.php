<?php

namespace App\Services;

use App\Events\ChannelUpdated;
use App\Http\Livewire\Channel\EditChannel;

class ChannelRepository
{
    public function saveChannel(EditChannel $channelDTO)
    {
        $channelDTO->authorize('update', $channelDTO->channel);
        $channelDTO->validate();
        $channelDTO->channel->save();
        session()->flash('message', 'Channel updated');
        ChannelUpdated::dispatch($channelDTO->channel);
        return redirect()->route('channel.edit', $channelDTO->channel->slug);
    }
}
