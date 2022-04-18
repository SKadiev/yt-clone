<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;

class ChannelInfo extends Component
{
    public Channel $channel;
    public string $isActive;

    public function render()
    {
        return view('livewire.channel.channel-info');
    }

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
        $this->isActive = $this->isSubcribed($this->channel);
    }

    public function subscribe()
    {
        if (auth()->user()->isSubscribedTo($this->channel)) {
            $this->channel->subscriptions()->where('user_id', auth()->id())->delete();
        } else {
            $this->channel->subscriptions()->create([
                'user_id' => auth()->id()
            ]);
        }

        $this->isActive = $this->isSubcribed();
    }

    public function isSubcribed()
    {
        return $this->channel->user->isSubscribedTo($this->channel);

    }
}
