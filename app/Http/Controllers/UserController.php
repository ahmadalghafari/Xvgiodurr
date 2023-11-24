<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userid = auth::user()->id;
        $users = User::where('id', '!=', $userid)
            ->whereNotIn('id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
            })
            ->get();

        return view('users.index' , compact('users'));
    }

    public function search($name){
        $userid = auth::user()->id;

        $users = User::where('id', '!=', $userid)
            ->where('name', '=' , $name)
            ->whereNotIn('id', function ($query) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', 3);
            })
            ->get();
        return view('users.index' , compact('users'));

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user){
        $posts = $user->post()->simplePaginate(5);
        return view('users.show' , compact('user','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
