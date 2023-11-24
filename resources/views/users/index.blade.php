@extends('layouts.test')

@section('meta')
@endsection

@section('links')
@endsection

@section('title')
    Users in the system
@endsection

@section('content')
    <table class="table  table-striped table-hover">
        @foreach($users as $user)
            <tr>
                <td>
                    <a href="{{route('users.show' , $user)}}" >{{$user->name}}</a><br>
                    @if(Auth::user()->follow->contains('user_follower',$user->id))
                        <button class="btn btn-secondary " disabled >Following</button>
                    @elseif(!(Auth::user()->follow->contains('user_follower',$user->id)) && !(Auth::user()->block->contains('user_blocked',$user->id)))
                        <form action="{{route('follows.store')}}" method="POST">
                            @csrf
                            <input type="text" name="name" value="{{$user->name}}" style="display: none">
                            <input type="submit" value="follow" class="btn btn-primary">
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('script')

@endsection
