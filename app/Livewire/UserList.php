<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public $models = [];

    public $isActiveChat;


    public function chat($uid,$uname)
    {
        $this->dispatch('open-chat', uid:$uid,uname:$uname)->to(Chat::class);
        $this->isActiveChat = $uid;
    }

    public function render()
    {
        $this->models = User::where('id','<>', auth()->user()->id)->limit(50)->get();
        return view('livewire.user-list');
    }
}
