<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Support\Str;
use Livewire\Component;


class EditChannel extends Component
{
    public string $name = 'tote';
    public Channel $channel;

    protected function rules()
    {
        return [
            'channel.name' => 'required|string|min:4|max:50|unique:channels,name,' . $this->channel->id,
            'channel.slug' => 'required|string|min:4|max:50|unique:channels,slug,' . $this->channel->id,
            'channel.description' => 'nullable|string|max:1000',
        ];
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function save()
    {
        $this->validate();
        $this->channel->save();
        session()->flash('message', 'Channel updated');
        return redirect()->route('channel.edit', $this->channel->slug);
    }

}
