<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
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

    </body>
</html>