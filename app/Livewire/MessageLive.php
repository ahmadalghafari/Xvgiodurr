<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ChMessage;


class MessageLive extends Component{

    public $user  ='';
    public $search = '' ;
    public $message = '' ;
    public  $reciver = '';
    public $reciver_id  ;


    public function toggleReceiver($reciver_id){
        $this->reciver_id = $reciver_id ;
        dd($this->reciver_id);
    }

    public function sendMessage(){

    }

    public function render(){
        // if($this->user != ''){
        //     dd($this->user);
        // }
        // dd($this->reciver);
        $userid = Auth::user()->id ;
        if($this->reciver_id != ''){
            dd($this->reciver_id);
            $this->message = ChMessage::where('from_id' ,$userid)->where('to_id', $this->reciver_id)->orWhere('from_id' ,$userid)->where('to_id', $this->reciver_id)->get();  
            $this->message = $this->message->fresh();
        }

        if($this->search == ''){
            $users = User::whereNotIn('id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
                })->whereIn('id', function ($query) use ($userid) {
                    $query->select('user_follower')
                        ->from('follows')
                    ->where('user_follow', $userid);
                })->take(10)->get(['id' , 'name' , 'email']);
        }else{
            $users = User::where('name', 'like', '%' . $this->search . '%')->take(10)->get(['id', 'name', 'email']);
        }
        // dd($this->reciver);

        return view('livewire.message-live' , compact('users'));
    }
}
