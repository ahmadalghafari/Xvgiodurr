<?php

namespace App\Http\Controllers;

use App\Models\post;
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
//        $userid = auth::user()->id;
//        $users = User::where('id', '!=', $userid)
//            ->whereNotIn('id', function ($query) use ($userid) {
//                $query->select('user_blocker')
//                    ->from('blocks')
//                    ->where('user_blocked', $userid);
//            })
//            ->get();
//
//        return view('users.index' , compact('users'));
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
    public function show(User $user){
//        dd($user);
        $posts = Post::where('user_id',$user->id)->latest()->get();
        return view('users.profile' , compact('posts' , 'user'));
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

    public function settings(Request $request){
        $user = Auth::user();

        $request->validate([
            'name' => 'required|unique:App\Models\User,name,'.$user->id,
            'email' => 'required|unique:App\Models\User,email,'.$user->id,
            'phone' => 'nullable|numeric',
            'overview' => 'nullable|max:200',
            'community_status' => 'nullable|in:single,married,divorced,in a relationship,taken,empty',
            'job' => 'nullable|max:20',
            'birth' => 'nullable|date',
            'address' => 'nullable',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if($request->community_status == 'empty'){
            $user->info()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $request->phone,
                    'overview' => $request->overview,
                    'community_status' => null,
                    'job' => $request->job,
                    'birth' => $request->birth,
                    'address' => $request->address,
                ]
            );
        }else{
            $user->info()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $request->phone,
                    'overview' => $request->overview,
                    'community_status' => $request->community_status,
                    'job' => $request->job,
                    'birth' => $request->birth,
                    'address' => $request->address,
                ]
            );
        }


        return redirect()->back()->with(['success' => 'Updated Successfully!']);
    }
}
