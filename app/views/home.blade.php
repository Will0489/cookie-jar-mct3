@extends('layouts.default')

@section('content')
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif

    @if (!empty($data))
        Hello, {{{ $data['username'] }}}
        <img src="{{ $data['photo']}}">
        <br>
        Your email is {{ $data['email']}}
        <br>
        <a href="logout">Logout</a>
    @else
        <br>Welcome to Cookie Jar!<br><br>
        You can login with Facebook or login with a Cookie Jar account via the link above.
    @endif
@stop