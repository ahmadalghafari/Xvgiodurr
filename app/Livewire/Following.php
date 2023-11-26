<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Following extends Component
{
    public function render()
    {
        $followers = Auth::user()->followMe->count();
        $following = Auth::user()->follow->count();
        return view('livewire.following' , compact('following', 'followers'));
    }

}
