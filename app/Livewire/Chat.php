<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Message;

class Chat extends Component
{
    public $models = [];

    public $uid;

    public $uname;

    public $message;

    public $showChat = false;

    #[On('open-chat')] 
    public function refreshChat($uid, $uname)
    {
        $this->uid = $uid;
        $this->uname = $uname;
        $this->showChat = true;
    }

    public function send()
    {
        Message::create([
            'from_user_id'=> auth()->id(),
            'to_user_id'=> $this->uid,
            'content' => $this->message
        ]);

        $this->reset('message');
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
