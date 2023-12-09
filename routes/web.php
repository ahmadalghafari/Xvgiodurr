<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Support\Facades\Auth;
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

//    Route::resource('users', UserController::class)->except('show');
    Route::get('users/show/{user}' ,[UserController::class , 'show'])->name('users.show')->middleware('block');
    Route::post('users/settings' , [UserController::class , 'settings'])->name('users.settings.post');
    Route::view('users/settings/{user}','users.settings')->name('users.settings')->middleware('checkUserSettings');

    Route::resource('comments' , CommentController::class)->except(['index' , 'create']);
    Route::resource('blocks', BlockController::class)->except('destroy');
    Route::delete('blocks/{user}' , [BlockController::class , 'destroy'])->name('blocks.destroy');
});

Auth::routes();







