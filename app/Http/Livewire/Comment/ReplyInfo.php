<?php

namespace App\Http\Livewire\Comment;

use App\Models\Channel;
use Livewire\Component;

class ReplyInfo extends Component
{
    public string $commentBody = '';
    public Channel $channel;

    public function mount()
    {
        $this->channel = auth()->user()->channel;
    }
    public function render()
    {
        return view('livewire.comment.reply-info');
    }
}
