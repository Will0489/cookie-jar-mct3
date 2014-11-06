@extends('layouts.default')

@section('content')
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif

    @if (!empty($data))
       
       {{ Form::open() }}
       <div class="section group">
       	<div class="col span_1_of_5">
       	</div>
		<div class="col span_3_of_5">
			<h2>Feeling lucky? Ask your question!</h2>
			<div>
				{{ Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-field', 'required' => 'required']) }}
			</div>

			<div>
				{{ Form::text('deadline', null, ['placeholder' => 'I can use some help till  dd.mm.yyyy', 'class' => 'form-field', 'required' => 'required']) }}
			</div>
			<div>
				{{ Form::textarea('body', null, [ 'rows' => 6, 'placeholder' => 'Specify your question in 300 characters', 'class' => 'form-field', 'required' => 'required']) }}
			</div>
			<div>
			    {{ Form::select('tags', array(0 => 'Enter tags below'), 0, ['multiple', 'data-role' => 'tagsinput', 'id' => 'tag_values', 'disabled' => 'disabled']) }}
				{{ Form::input('tag', null, ['placeholder' => 'Start typing some tags...', 'class' => 'form-field', 'required' => 'required', 'id' => 'tag']) }}
				<small>Is your tag not showing up? Enter it and we'll create it for you!</small>
				<br><br>
			</div>

			<div>
				{{ Form::submit('Ask!', ['class' => 'btn red big']) }}
			</div>
			<div>
				@if($errors->any())
				<p class='xs'>{{$errors->first()}}</p>
				<br/>
				@endif
			</div>
			<br/>
		{{ Form::close() }}
	</div>
</div>

    @endif
@stop