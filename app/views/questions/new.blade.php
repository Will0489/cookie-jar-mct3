@extends('layouts.default')

@section('content')
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif

    @if (!empty($data))
        <!-- TODO: NEW QUESTION FORM -->
    @endif
@stop