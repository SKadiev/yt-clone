<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Support\Str;
use Livewire\Component;


class EditChannel extends Component
{
    public string $name = 'tote';
    public Channel $channel;

    protected array $rules = [
        'channel.name' => 'required|string|min:4',
    ];

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function save()
    {
        $this->validate();
        $this->channel->slug = Str::slug($this->channel->name, '-');
        $this->channel->save();

        return back()->status(201);
    }


}
