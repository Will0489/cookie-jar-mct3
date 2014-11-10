@extends('layouts.default')

@section('content')
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif

    <div class="section group">
        <div class="col span_1_of_5"></div>
        <div class="col span_3_of_5">
            <h2>Edit Profile</h2>
            {{ Form::open(['route' => 'user.update', 'method' => 'post']) }}

                @if(isset($data['photo']))
                Your current profile picture<br><br>
                <img src="{{$data['photo']}}" alt="{{$data['first_name']}}'s profile picture"><br><br>
                @else
                You don't have a profile picture yet!<br><br>
                @endif
            <div class="btn">
                {{ Form::label('photo', 'Choose a nice picture of yourself') }} {{ Form::file('photo', null, ['class' => 'form-field']) }}
            </div>

            <div>
                {{ Form::label('school', "I'm studying") }}
                {{ Form::text('school', null, ['class' => 'form-field', 'placeholder' => 'Web Dev & UX @ KdG']) }}
            </div>

            <div >
                {{ Form::label('portfolio_link', 'My portfolio') }}
                {{ Form::text('portfolio_link', null, ['class' => 'form-field', 'placeholder' => 'ksenia.be']) }}
            </div>
            <div class="s-tag">
                {{ Form::label('tag', "I'm passionate about") }}
                {{ Form::text('tag', null, ['placeholder' => 'Add some tags!', 'class' => 'form-field tag', 'id' => 'tag']) }}
                <br>
                <div id="tags">
                </div>
                <small>Tag not showing up in the list? Enter yours, hit space and we'll add it for you!</small>
                <br><br>
            </div>
            <div>
                {{ Form::submit('Update Profile', ['class' => 'btn small blue'])}}
            </div>
            {{ Form::close() }}
    	</div>
    </div>
@stop