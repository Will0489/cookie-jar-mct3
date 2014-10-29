@extends('layouts.default')

@section('content')
    <br>
        {{ Form::open(['route' => 'sessions.store']) }}
            
            <div>
                <a href="/login/fb">Sign In with Facebook</a>
            </div>  

                {{ Form::label('email', 'E-mail address:') }}
                {{ Form::text('email') }}
            </div>

            <div>
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-field', 'required' => 'required']) }}
            </div>

            <div>
                {{ Form::submit('Login') }} </a>
            </div>
            <div>
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
            </div>
        {{ Form::close() }}
        <p>Need an account? <a href="signup" class="">Sign Up</a></p>
@stop