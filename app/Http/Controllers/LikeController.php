<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller{
    public function store(Request $request){
        like::create([
            'user_id' => auth::user()->id,
            'post_id' => $request->post_id
        ]);
        return back();
    }
    public function destroy(like $like){
        $like->delete();
        return back();
    }
}
