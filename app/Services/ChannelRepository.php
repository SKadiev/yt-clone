<?php

namespace App\Services;

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
//            session()->flash('message', 'Channel updated');
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
        if ($channelDTO->image) {
            $image = $channelDTO->image->storeAs('photos', $channelDTO->channel->uid . '.png', 'public');
            $imgStoragePath = storage_path('app/public/' . $image);
            $img = Image::make($imgStoragePath)
                ->encode('png')
                ->fit(100, 100, function ($constraint) {
                    $constraint->upsize();
                })->save();
            $channelDTO->channel->update(['image' => $image]);
        } else {
            throw new ImageNotStoredException();
        }
    }
}
