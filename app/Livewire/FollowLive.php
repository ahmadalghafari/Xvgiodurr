<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\follow;

class FollowLive extends Component
{
    public $user;
    public function mount($user){
        $this->user = $user ;
    }
    public function toggleFollow() :void{
        if(Auth::user()->follow->contains('user_follower' , $this->user->id)){
            Auth::user()->follow()->where('user_follower' , $this->user->id)->delete();
        }else{
//            follow::create([
//                'user_follow' => Auth::user()->id ,
//                'user_follower' => $this->user->id ,
//            ]);
            Auth::user()->follow()->create(['user_follower' => $this->user->id]);
        }
        $this->user = $this->user->fresh() ;
    }
    public function render()
    {
        return view('livewire.follow-live');
    }
}
