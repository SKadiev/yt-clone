<?php

namespace App\Http\Livewire\Channel;

use App\Events\ChannelUpdated;
use App\Models\Channel;
use App\Services\ChannelRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditChannel extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public string $name = 'tote';
    public Channel $channel;
    public $image;
    protected $listeners = ['channelUpdate' => 'handleUpdate'];

    protected function rules()
    {
        return [
            'channel.name' => 'required|string|min:4|max:50|unique:channels,name,' . $this->channel->id,
            'channel.slug' => 'required|string|min:4|max:50|unique:channels,slug,' . $this->channel->id,
            'channel.description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:5120',
        ];
    }

    public function handleUpdate(ChannelRepository $channelRepository)
    {
        $channelRepository->saveChannel($this);
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function save(ChannelRepository $channelRepository)
    {
        $channelRepository->saveChannel($this);
    }

}
