@extends('livewire.layouts.test')

@section('meta')
@endsection

@section('links')
@endsection

@section('title')
@endsection

@section('content')

    <div class="row text-bg-dark text-center ">
        <div class="col-3 p-3">
            <div class="row">
                <div class="col">
                    helper
                </div>
            </div>
        </div>
        <div class="col-6 ">
            <div class="row">
                <div class="col ">
                    posts
                </div>
            </div>
            {{-- <div class="container" style="background-color:rgb(12, 11, 11) "> --}}
            <form action="{{route('home.posts.store')}}" method="POST" enctype="multipart/form-data" id="post_form">
                @csrf

                <input type="text" name="text" id="post_text" class="form-control"><br>
                <button type="button" class="p-0 m-0 text-center" data-bs-toggle="modal" data-bs-target="#postFiles"
                        width="100%" height="100%">
                    Add Files
                </button>
                <div class="modal fade text-start" id="postFiles" tabindex="-1" aria-labelledby="postFiles"
                     aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content text-bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="postFiles">File , Photo , Video </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-bg-dark">
                                file : <input type="file" name="file_path" id="file" class="form-control"><br>
                                photo : <input type="file" name="photo_path" id="photo" class="form-control"><br>
                                video : <input type="file" name="video_path" id="video" class="form-control"><br>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="post" id="post_submit" disabled>
            </form>
            @foreach($posts as $post)
                <div class="row mx-3 justify-content-start" style='background-color:rgb(12, 11, 11)'><!-- //one post -->
                    <div class="col-2 my-3 "><!-- photo -->
                        <img src="{{asset('/photo/ahmad.jpg')}}" class="rounded float-start" alt="..." width="100%"
                             height="100%">
                    </div>

                    <h1 class="col-9 display-6 my-3"><!-- name -->
                        <p class="m-0 p-3">
                            {{$post->user->name}}
                        </p>
                    </h1>

                    <div class="col-1 my-3 py-4 "><!-- dropdown -->
                        <div class="dropdown">
                            <a class="btn btn-secondary m-0 p-0 dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">spam</a></li>
                                <li><a class="dropdown-item" href="#">block</a></li>
                                <li><a class="dropdown-item" href="#">unfollow</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 display-6 text-start">
                        <p class="h5">{{$post->text}}</p>
                    </div>
                    <br>
                    <div class="col">
                        <img src="{{asset('/photo/ahmad.jpg')}}" class="rounded float-start" alt="..." width="100%"
                             height="100%">
                    </div>
                    <div class="col">
                        <video src="{{ asset('/photo/ahmad.mp4') }}" width="100%" height="100%" controls></video>
                    </div>
                    <hr>

                    <div class="col-3">
                        @if(!(Auth::user()->like->contains('post_id',$post->id)))
                            <form action="{{route('likes.store') }}" method="POST">
                                @csrf
                                <input type="text" value="{{$post->id}}" name="post_id" style="display: none">
                                <input type="submit" value="Like" name="like" class="btn btn-secondary text-bg-light ">
                            </form>
                        @else
                            <form action="{{route('likes.destroy' , $post->like->where('user_id',Auth::user()->id)->first() ) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Liked" class="btn btn-primary">
                            </form>
                        @endif
                    </div>

                    <div class="col-3">
                        <a href="" class="p-0 m-0 text-center" width="100%" height="100%"><p class="h5 mx-2"
                                                                                             style="display: inline-block">{{ count($posts[0]->like)}}</p>
                            <p class="h5" style="display: inline-block">likes</p></a>
                        <button type="button" class="p-0 m-0 text-center" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$post->id}}" width="100%" height="100%">
                            likes
                        </button>
                        <div class="modal fade text-start" id="exampleModal{{$post->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel{{$post->id}}" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content text-bg-dark">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{$post->id}}">Likes</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-bg-dark">
                                        <table class="table table-dark table-striped">
                                            @foreach($post->like as $like)
                                                <tr class="row">
                                                    <td class="col-2"><img src="{{ asset($like->user->photo->path) }}"
                                                                           alt="personal photo"
                                                                           class="rounded float-start" width="100%"
                                                                           height="100%"></td>
                                                    <td class="col-8"><a
                                                                href="{{route('users.show' , $like->user )}}">{{$like->user->name}}</a>
                                                    </td>
                                                    @if(!Auth::user()->id == $like->user->id)
                                                        <td class="col-2">
                                                            @if(Auth::user()->follow->contains('user_follower',$like->user->id))
                                                                <form action="{{route('follows.destroy' , Auth::user()->follow->where('user_follower',$like->user->id) )}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="text" name="name"
                                                                           value="{{$like->user->name}}"
                                                                           style="display: none">
                                                                    <input type="submit" value="unfollow"
                                                                           class="btn btn-primary">
                                                                </form>
                                                            @elseif(!(Auth::user()->follow->contains('user_follower',$user->id)) && !(Auth::user()->block->contains('user_blocked',$user->id)))
                                                                <form action="{{route('follows.store')}}" method="POST">
                                                                    @csrf
                                                                    <input type="text" name="name"
                                                                           value="{{$like->user->name}}"
                                                                           style="display: none">
                                                                    <input type="submit" value="follow"
                                                                           class="btn btn-primary">
                                                                </form>
                                                            @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-3">
                        <a href="" class="btn btn-primary ">
                            Comment
                        </a>
                    </div>


                    <div class="col-3">
                        <a href="" class="p-0 m-0 text-center" width="100%" height="100%"><p class="h5 mx-1"
                                                                                             style="display: inline-block">{{ count($post->comment)}}</p>
                            <p class="h5 mx-1" style="display: inline-block">comments</p></a>
                    </div>


                </div>
            @endforeach

        </div>


    </div>
    <div class="col-3 p-3">
        <div class="row">
            <div class="col">
                setting
            </div>
        </div>
    </div>
    </div>

@endsection

@section('error')

@endsection

@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
