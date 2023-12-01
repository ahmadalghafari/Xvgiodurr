<?php

namespace App\Livewire;
use App\Models\Post;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeLive extends Component
{
    public $post ;

    public function mount($post)
    {
        $this->post = $post;
    }
    public function toggleLike(): void
    {
        if(Auth::user()->like()->where('post_id',$this->post->id)->exists()){
            Auth::user()->like()->where('post_id',$this->post->id)->delete();
        }else{
            Auth::user()->like()->create(['post_id' => $this->post->id]);
        }
        $this->post = $this->post->fresh();
    }
    public function render()
    {
        return view('livewire.like-live');
    }
}
