@extends('layouts.default')

@section('content')
    <h3>Your profile</h3>
    <p><img src="{{ $data->photo }}" /></p>
    <p>Welcome back {{ $data->username }}. Your profile details can be found below.</p>
    <p>You registered using {{ $data->email }} on {{ $data->created_at }}</p>

@stop