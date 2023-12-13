<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\post;
class Search extends Component
{
    public $search = '';


    public function render(){
        $userid = Auth::user()->id ;

        $posts = Post::whereNotIn('user_id', function ($query) use ($userid) {
            $query->select('user_blocker')
                ->from('blocks')
                ->where('user_blocked', $userid);
        })->where('text' , 'like' , '%'.$this->search.'%')->latest()->get();

        $users = User::where('id', '!=', $userid)
            ->where('name', 'like' , '%'.$this->search.'%')
            ->whereNotIn('id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
            })->get();
        return view('livewire.search'  , ['posts' => $posts , 'users'=> $users]);
    }
}
