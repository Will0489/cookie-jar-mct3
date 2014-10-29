@extends('layouts.default')

@section('content')
    <p>Fill out the form below to create an account or you can <a href="login/fb">login with Facebook</a>. Fields marked with * are mandatory.</p>
        {{ Form::open(['route' => 'user.store', 'method' => 'post', 'files' => true]) }}
            <div>
                {{ Form::label('username', '* Username:') }}
                {{ Form::text('username') }}
            </div>
            <div>
                {{ Form::label('password', '* Password:') }}
                {{ Form::password('password') }}
            </div>
            <div>
                {{ Form::label('password_confirmation', '* Confirm password:') }}
                {{ Form::password('password_confirmation') }}
            </div>
            <div>
                {{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'form-field', 'required' => 'required']) }}
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
                <h4>{{$errors}}</h4>
                @endif
            </div>
        {{ Form::close() }}
@stop