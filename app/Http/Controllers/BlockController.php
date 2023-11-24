<?php

namespace App\Http\Controllers;

use App\Models\block;
use App\Models\follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request){
        $userid2 = user::where('name' ,  $request->name)->first();
        if(auth::user()->id == $userid2->id){
            //spam code!!
            return back()->with('error_block','you can not block your self!');
        }

        if (Auth::user()->block->contains('user_blocked',$userid2->id)) {
            //spam code!!
            return back()->with('error_block','you can not block him twice!');
        }

        if(Auth::user()->follow->contains('user_follower',$userid2->id)){
            Auth::user()->follow()->where('user_follower',$userid2->id)->delete();
        }

        if($userid2->follow->contains('user_follower' , auth::user()->id)){
            $userid2->follow()->where('user_follower',auth::user()->id)->delete();
        }

        block::create([
            'user_blocker' => auth::user()->id,
            'user_blocked' => $userid2->id ,
        ]);
        return back();
    }
    public function show(block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(block $block)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, block $block)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(block $block)
    {
        //
    }
}
