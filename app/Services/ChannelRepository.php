<?php

namespace App\Services;

use App\Classes\ChannelImage;
use App\Events\ChannelUpdated;
use App\Exceptions\ImageNotStoredException;
use App\Http\Livewire\Channel\EditChannel;
use Faker\Core\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ChannelRepository
{

    public function saveChannel(EditChannel $channelDTO)
    {
        $channelDTO->authorize('update', $channelDTO->channel);
        $channelDTO->validate();
        $channelDTO->channel->save();
        try {
            $this->imageStore($channelDTO);
            ChannelUpdated::dispatch($channelDTO->channel);
        } catch (ImageNotStoredException $e) {
        }
        return redirect()->route('channel.edit', $channelDTO->channel->slug)->with('message', "Channel updated");
    }

    /**
     * @throws ImageNotStoredException
     */
    public function imageStore(EditChannel $channelDTO): void
    {
        $image = new ChannelImage($channelDTO->channel, $channelDTO->image);
        $image->imageStore();
    }
}
