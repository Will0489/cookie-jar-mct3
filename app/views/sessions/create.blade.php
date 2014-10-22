@extends('layouts.default')

@section('content')
        {{ Form::open(['route' => 'sessions.store']) }}
            <div>
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username') }}
            </div>

            <div>
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
            </div>

            <div>
                {{ Form::submit('Login') }}
            </div>
            <div>
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
            </div>
        {{ Form::close() }}
@stop