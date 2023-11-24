@extends('layouts.test')

@section('meta')
@endsection

@section('links')
@endsection

@section('title')
    posts
@endsection

@section('content')
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" id="post_form">
        @csrf

        <input type="text" name="text" id="post_text"><br>
        file : <input type="file" name="file_path" id="file"><br>
        photo : <input type="file" name="photo_path" id="photo"><br>
        video : <input type="file" name="video_path" id="video"><br>

        <input type="submit" value="post" id="post_submit" disabled>
    </form>
    @foreach($posts as $post)
        <p>{{$post->text}}</p>
        <form action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data" id="post_form">
            @csrf
            <input type="text" name="text" id="post_text"><br>
            file : <input type="file" name="file_path" id="file"><br>
            photo : <input type="file" name="photo_path" id="photo"><br>
            video : <input type="file" name="video_path" id="video"><br>

            <input type="submit" value="post" id="post_submit" disabled>
        </form>
        <br>
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
        <h6>{{ count($post->like)}}</h6>
        <hr>
    @endforeach
    {{ $posts->links() }}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection

@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

