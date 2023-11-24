@extends('layouts.test')

@section('meta')
@endsection

@section('links')
@endsection

@section('title')
    {{$user->name}}
@endsection

@section('content')

    <h3>
        {{$user->name}} <br>
    </h3>


    @if(Auth::user()->follow->contains('user_follower',$user->id))
        <button class="btn btn-secondary " disabled >Following</button>
    @elseif(!(Auth::user()->follow->contains('user_follower',$user->id)) && !(Auth::user()->block->contains('user_blocked',$user->id)))
        <form action="{{route('follows.store')}}" method="POST">
            @csrf
            <input type="text" name="name" value="{{$user->name}}" style="display: none">
            <input type="submit" value="follow" class="btn btn-primary">
        </form>
    @endif


    @if(Auth::user()->block->contains('user_blocked',$user->id))
        <button class="btn btn-warning" disabled >blocked</button>
    @else
        <form action="{{route('blocks.store')}}" method="POST">
            @csrf
            <input type="text" name="name" value="{{$user->name}}" style="display: none">
            <input type="submit" value="blocks" class="btn btn-danger">
        </form>
    @endif
    <br> <br>




    @foreach($posts as $post)
        {{$post->text}}
        @if(!(Auth::user()->like->contains('post_id',$post->id)))
        <form action="{{route('likes.store') }}" method="POST">
            @csrf
            <input type="text" value="{{$post->id}}" name="post_id" style="display: none">
            <input type="submit" value="Like" name="like" class="btn btn-primary">
        </form>
        @else
            <form action="{{route('likes.destroy' , $post->like->where('user_id',Auth::user()->id)->first() ) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Liked"  class="btn btn-primary">
            </form>
        @endif
        <form action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data" id="post_form">
            @csrf
            <input type="text" name="text" id="post_text"><br>
            file : <input type="file" name="file_path" id="file"><br>
            photo : <input type="file" name="photo_path" id="photo"><br>
            video : <input type="file" name="video_path" id="video"><br>

            <input type="submit" value="post" id="post_submit" disabled>
        </form>
        <br><hr>
    @endforeach
    {{ $posts->links() }}





@endsection

@section('error')
    @if(session('error_follow'))
        <script>alert('{{session('error_follow')}}')</script>
        @php
        session()->forget('error_follow');
        @endphp
    @endif
    @if(session('error_block'))
        <script>alert('{{session('error_block')}}')</script>
        @php
        session()->forget('error_block')
        @endphp
    @endif
@endsection

@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
