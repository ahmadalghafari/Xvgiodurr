<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\share;
use Illuminate\Support\Facades\Auth;


class Sharelive extends Component
{
    public $post ;
    public $isshared;
    public function mount($post){
        $this->post = $post;
        $this->isshared = share::where('post_id',$this->post->id)->where('user_id',Auth::user()->id)->exists();
    }

    public function shareing(){
        $user_id = Auth::user()->id;
        // dd($this->isshared);
        if($this->isshared){
            share::where('post_id',$this->post->id)->where('user_id',$user_id)->delete();
            $this->isshared = false ;
        }else{
            share::create([
                'user_id'=>$user_id,
                'post_id'=>$this->post->id,
            ]);
            $this->isshared = true ;
        }
        $this->post = $this->post->fresh();
    }
    public function render()
    {
        return view('livewire.sharelive');
    }
}
