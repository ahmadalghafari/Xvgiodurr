<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::view('testing','testing.test');
Route::name('home.')->middleware('auth')->prefix('home/')->group(function (){
    Route::resource('posts',PostController::class);
    Route::resource('follows' , FollowController::class);
    Route::resource('likes' , LikeController::class)->except(['index','show','create','update','edit']);
    Route::resource('users' , UserController::class);
    Route::resource('comments' , CommentController::class)->except(['index' , 'create']);

    Route::get('users/search/{name}' , [UserController::class , 'search'])->name('users.search');
    Route::view('addpost' ,'posts.test' );
    Route::resource('blocks', BlockController::class);


});

Route::get( 'test' ,[PostController::class , 'index'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get( 'home/posts/edit/{id}' ,[PostController::class , 'edit'] )->name('edit.post');
Route::put( 'home/posts/update/{id}' ,[PostController::class , 'update'] )->name('update.post');

//Route::get( 'home/posts' ,[PostController::class ] )->name('posts');
