<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller{
    public function destroy(User $user){
        if(Auth::user()->follow()->where('user_follower',$user->id)->exists()){
            Auth::user()->follow()->where('user_follower',$user->id)->delete();
            return back();
        }
        return back();
    }
}
