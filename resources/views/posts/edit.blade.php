@extends('livewire.layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('update.post', $post->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="text">Text:</label>
            <input type="text" name="text" id="text" value="{{ $post->text }}">
        </div>

        <button type="submit">Update Post</button>
    </form>
@endsection


