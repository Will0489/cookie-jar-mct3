@extends('layouts.default')

@section('content')
    <br>
        {{ Form::open(['route' => 'sessions.store']) }}
            <div>
                {{ Form::label('email', 'E-mail address:') }}
                {{ Form::text('email') }}
            </div>

            <div>
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
            </div>

            <div>
                {{ Form::submit('Login') }} or <a href="/login/fb">login via Facebook</a>
            </div>
            <div>
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
            </div>
        {{ Form::close() }}
@stop