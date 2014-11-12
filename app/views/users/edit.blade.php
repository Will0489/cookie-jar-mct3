@extends('layouts.default')

@section('content')
@if(Session::has('message'))
{{ Session::get('message')}}
@endif

<div class="section group">
	<div class="col span_1_of_5"></div>
	<div class="col span_3_of_5">
		<h2>Edit Profile</h2>
		{{ Form::open(['route' => 'user.update', 'method' => 'PUT', 'files' => true]) }}

		@if(isset($data['photo']))
		Your current profile picture<br><br>
		<img src="{{$data->photo}}" alt="{{$data->first_name}}'s profile picture" class="avatar"><br><br>
		@else
		You don't have a profile picture yet!<br><br>
		@endif
		<div class="btn">
			{{ Form::label('photo', 'Choose a nice picture of yourself') }} {{ Form::file('photo', null, ['class' => 'form-field']) }}
		</div>

		<div>
			{{ Form::label('school', "I'm studying") }}
			@if(isset($data['studies_at']))
			{{ Form::text('school', $data['studies_at'], ['class' => 'form-field', 'placeholder' => 'Web Dev & UX @ KdG']) }}
			@else
			{{ Form::text('school', null, ['class' => 'form-field', 'placeholder' => 'Web Dev & UX @ KdG']) }}
			@endif
		</div>

		<div >
			{{ Form::label('portfolio_link', 'My portfolio') }}
			@if(isset($data['portfolio']))
			{{ Form::text('portfolio_link', $data['portfolio'], ['class' => 'form-field', 'placeholder' => 'ksenia.be']) }}
			@else
			{{ Form::text('portfolio_link', null, ['class' => 'form-field', 'placeholder' => 'ksenia.be']) }}
			@endif
		</div>
		<div class="s-tag">
			{{ Form::label('tag', "I'm passionate about") }}
			{{ Form::text('tag', null, ['placeholder' => 'Add some tags!', 'class' => 'form-field tag', 'id' => 'tag']) }}
			<br>
			<div id="existing tags">
				@foreach($data->categories as $category)
				<span class="category btn">{{$category['name']}}</span>
				<input type="hidden" name="existingvalues[]" value="{{$category['id']}}">
				@endforeach
			</div>
			<div id="tags">
			</div>
			<div id="deletedtags"></div>
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