@extends('layouts.default')

@section('content')
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif

    @if (!empty($data))
        <!-- TODO: QUESTION OVERVIEW DISPLAY -->
    @endif
@stop