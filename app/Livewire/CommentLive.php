<?php

namespace App\Livewire;

use Livewire\Component;

class CommentLive extends Component
{
    public $post ;
    public function mount($post){
        $this->post = $post ;
    }
    public function addComment(){
        
    }
    public function render()
    {
        $comment = $this->post->comment()->latest()->take(1)->get() ;
        $comments = $comment->first();
        
        return view('livewire.comment-live' , ['comment' => $comments]);
    }
}
