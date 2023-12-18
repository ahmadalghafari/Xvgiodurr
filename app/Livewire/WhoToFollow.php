<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class WhoToFollow extends Component
{
    public function toggleFollow(){
        $user = Auth::user()->id ;
        $users =
            User::whereNotIn('id' , function ($q) use($user)
                    {$q->select('user_follower')->from('follows')->where('user_follow' , $user);})
                ->whereNotIn('id' , function ($q) use($user)
                    {$q->select('user_follow')->from('follows')->where('user_follower' , $user);});
    }
    public function render()
    {
        return view('livewire.who-to-follow');
    }
}
