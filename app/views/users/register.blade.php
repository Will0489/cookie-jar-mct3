@extends('layouts.default')

@section('content')
        {{ Form::open(['route' => 'user.store', 'method' => 'post', 'files' => true]) }}
            <div>
                {{ Form::text('firstname', null, ['placeholder' => 'First Name', 'class' => 'form-field', 'required' => 'required']) }}
                {{ Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-field', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'form-field', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-field', 'required' => 'required']) }}
            </div>
            <div>
                {{ Form::submit('Sign Up') }}
            </div>
            <div>
                @if($errors->any())
                <h4>{{$errors}}</h4>
                @endif
            </div>
            <p>Creating an account means you are ok with our Terms of Service and Privacy Policy.
            </p>
            <p>Already have an account? <a href="login">Sign in</a></p>
        {{ Form::close() }}
@stop