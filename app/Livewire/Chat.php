<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\User;
use App\Models\Message;

class Chat extends Component
{
    public $models = [];

    public User $model;

    public $uid;

    public $message;

    public $showForm = false;

    #[On('open-chat')] 
    public function refreshChat($uid)
    {
        $this->uid = $uid;
        $this->showForm = true;
    }

    public function send()
    {
        Message::create([
            'from_user_id'=> auth()->id(),
            'to_user_id'=> $this->uid,
            'content' => $this->message
        ]);

        $this->reset('message');
        $this->dispatch('open-chat', uid:$this->uid)->to(Chat::class);
    }

    public function render()
    {
        $this->models = [];
        $this->models = Message::where('from_user_id', auth()->id())
        ->where('to_user_id', $this->uid)
        ->orWhere('from_user_id', $this->uid)
        ->where('to_user_id', auth()->id())
        ->orderBy('created_at','asc')
        ->get();
        return view('livewire.chat');
    }
}
