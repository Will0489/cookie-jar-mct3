@extends('layouts.default')

@section('content')
    <p>Fill out the form below to create an account. Fields marked with * are mandatory.</p>
        {{ Form::open(['route' => 'user.create']) }}
            <div>
                {{ Form::label('username', '* Username:') }}
                {{ Form::text('username') }}
            </div>
            <div>
                {{ Form::label('password', '* Password:') }}
                {{ Form::password('password') }}
            </div>
            <div>
                {{ Form::label('password_confirm', '* Confirm password:') }}
                {{ Form::password('password_confirm') }}
            </div>
            <div>
                {{ Form::label('email', '* E-mail:') }}
                {{ Form::email('email') }}
            </div>
            <div>
                {{ Form::label('photo', 'Profile picture:') }}
                {{ Form::file('photo') }}
            </div>
            <div>
                {{ Form::submit('Register') }}
                {{ Form::reset('Reset') }}
            </div>
            <div>
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
            </div>
        {{ Form::close() }}
@stop