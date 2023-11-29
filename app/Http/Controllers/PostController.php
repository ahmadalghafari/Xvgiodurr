<?php

namespace App\Http\Controllers;

use App\Models\post;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Rules\EmptyFields;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\file;

class PostController extends Controller{
    public function index(Request $request){
        $userid = auth::user()->id;

        $posts = Post::whereNotIn('user_id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
            })->whereIn('user_id', function ($query) use ($userid) {
                $query->select('user_follower')
                    ->from('follows')
                    ->where('user_follow', $userid);
            })->simplePaginate(5);
        if($request->ajax()){
            $view = view('posts.load', compact('posts'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $posts->nextPageUrl()]);
        }
//        dd($posts);
        return view('home' , compact('posts'));
    }

    public function create(){

    }

    public function store(Request $request){
//        dd($request);
        $error_message = 'You cannot post empty content!';
        $request->validate([
            'images.*' => 'required_without_all:files,videos,voice,text|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'files.*' => 'required_without_all:images,videos,voice,text|max:2048',
            'videos.*' => 'required_without_all:files,voice,images,text|mimetypes:video/avi,video/mpeg,video/mp4|max:10000',
            'voice.*' => 'required_without_all:files,images,videos,text|mimetypes:audio/mpeg,audio/wav|max:10000',
            'text' => 'required_without_all:files,voice,videos,images|min:1']
            ,[
                'images.required_without_all' =>  $error_message,
                'files.required_without_all' => $error_message ,
                'videos.required_without_all' => $error_message ,
                'text.required_without_all' => $error_message ,
                'voice.required_without_all' => $error_message
            ]
        );


        $text = $request->text ?: '';
        $id =auth::user()->id;

        $post = post::create([
            'user_id' => $id,
            'text' => $text ,
        ]);

        $fileTypes = ['images', 'videos', 'files', 'voice'];

        foreach ($fileTypes as $fileType) {
            if ($request->hasFile($fileType)) {
                foreach ($request->file($fileType) as $file) {
                    $fileName = $id . '.' . time() . '.' . $file->extension();
                    $filePath = 'posts_' . $fileType . '/' . $fileName;

                    file::create([
                        'post_id' => $post->id,
                        'file_path' => $filePath,
                        'file_type' => $fileType,
                        'prefix' => $file->extension(),
                    ]);

                    $file->move(public_path('posts_' . $fileType), $fileName);
                }
            }
        }

        // Return a success message
        return redirect()->route('home.posts.index');

    }

    public function show(post $post){

    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts/edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->text = $request->text;
        $post->save();
        return redirect()->route('posts', $id);
    }

    public function destroy(post $post){
        $post->delete();
        return back();
    }
}
