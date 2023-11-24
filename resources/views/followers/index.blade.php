@extends('layouts.test')

@section('meta')
@endsection

@section('links')
@endsection

@section('title')
    my follows
@endsection

@section('content')

    <table class="table  table-striped table-hover">
        @foreach($followers as $follow)
            <tr>
                <td ><a href="{{route('users.show' ,$follow->user_follower)}}"> {{$follow->mind->name}} </a>

                    <form action="{{route('blocks.store' )}}" method="POST">
                        @csrf
                        <input type="text" name="name" value="{{$follow->mind->name}}" style="display: none">
                        <input type="submit" value="blocks" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('script')

@endsection
