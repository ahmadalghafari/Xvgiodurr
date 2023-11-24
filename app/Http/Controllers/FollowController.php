<?php

namespace App\Http\Controllers;

use App\Models\follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    public function index()
    {
        $userid = auth::user()->id;
        $followers = follow::where('user_follow',$userid);
        $followers = auth::user()->follow;
//        dd($followers);
        return view('followers.index' , compact('followers'));
    }


    public function create()
    {
        //
    }


    public function store( Request $request ){
        $userid = auth::user()->id;

        $userid2 = user::where('name' ,  $request->name)->first()->id;

        if($userid == $userid2){
            //spam code
            return back()->with('error_follow','you can not follow your self!');
        }
        $test = follow::where('user_follow','=',$userid)->where('user_follower','=',$userid2)->first();

        if (!($test === null)) {
            //spam code!!
            return back()->with('error_follow','you can not follow him twice!');
        }
        follow::create([
            'user_follow' => $userid ,
            'user_follower' => $userid2 ,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(follow $follow)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(follow $follow){
        $follow->delete;
        return back();
    }
}
