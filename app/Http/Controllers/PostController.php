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
            })->latest()->Paginate(5);

        if($request->ajax()){
            $view = view('posts.load', compact('posts'))->render();
            return response()->json(['view' => $view, 'nextPageUrl' => $posts->nextPageUrl()]);
        }
        return view('home' , compact('posts'));
    }

    public function create(){

    }

    public function store(Request $request){

        $error_message = 'You cannot post empty content!';
        $request->validate([
            'images.*' => 'required_without_all:files,videos,voice,text|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'files.*' => 'required_without_all:images,videos,voice,text|max:5000',
            'videos.*' => 'required_without_all:files,voice,images,text|mimetypes:video/avi,video/mpeg,video/mp4|max:100000',
            'voice.*' => 'required_without_all:files,images,videos,text|mimetypes:audio/mpeg,audio/wav|max:10000',
            'text' => 'required_without_all:files,voice,videos,images']
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
                foreach ($request->file($fileType) as $key => $file) {
                    $fileName = $id . '.' . time() . '.' . $key . '.' . $file->extension();
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


        return redirect()->back();//route('home.posts.index');

    }

    public function show(post $post){
        return view('posts.show' , compact('post'));

    }
    public function edit(post $post)
    {

    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->text = $request->text;
        $post->save();
        return view('myprofile');
    }


    public function destroy($id){
        // Check if the post exists
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        // Check if the current user is the owner of the post

        if ($post->user->id != Auth::user()->id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this post');
        }

        // Delete associated files
        $files = File::where('post_id', $post->id)->get();

        foreach ($files as $file) {
            $filePath = public_path($file->file_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file->delete();
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }

}
