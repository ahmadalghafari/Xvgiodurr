<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
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


    Route::resource('blocks', BlockController::class);

    Route::get('my_profile/settings/passwords' , [ConfirmPasswordController::class , 'update'])->name('passwords');
    Route::view('home/my_profile/settings','users.settings')->name('settings');

});


Auth::routes();







