@extends('layouts.default')

@section('content')


<div class="section group">
	<div class="col span_1_of_5"></div>
	<div class="col span_3_of_5">
		<h2>Edit Profile</h2>
		{{ Form::open() }}

		<div class="btn">
			{{ Form::label('image', 'Choose some nice pic of you') }}
			{{ Form::file('image', null, ['class' => 'form-field']) }}
		</div>

		<div>
			{{ Form::label('school', "I'm Studying") }}
			{{ Form::text('school', null, ['class' => 'form-field', 'placeholder' => 'Web Dev & UX @ KdG']) }}
		</div>

		<div >
			{{ Form::label('portfolio_link', 'My portfolio') }}
			{{ Form::text('portfolio_link', null, ['class' => 'form-field', 'placeholder' => 'ksenia.be']) }}
		</div>
		<div >
			{{ Form::label('tags', "I'm passionate about") }}
			{{ Form::text('tags', null, ['class' => 'form-field', 'placeholder' => 'Add some tags!']) }}
		</div>
		<div>
			{{ Form::submit('Update Profile', ['class' => 'btn small blue'])}}
		</div>
		{{ Form::close() }}

	</div>
</div>
@stop