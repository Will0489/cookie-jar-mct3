@extends('layouts.default')

@section('content')
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif

    @if (!empty($data))
       
       {{ Form::open(['route' => 'question.store', 'method' => 'post']) }}
       <div class="section group">
       	<div class="col span_1_of_5"></div>
		<div class="col span_3_of_5">
			<h2>Feeling lucky? Ask your question!</h2>
			<div>
				{{ Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-field', 'required' => 'required']) }}
			</div>

			<div>
				{{ Form::text('deadline', null, ['placeholder' => 'I can use some help till  dd.mm.yyyy', 'class' => 'form-field', 'required' => 'required']) }}
			</div>
			<div>
				{{ Form::textarea('body', null, ['placeholder' => 'Specify your question in 300 characters', 'class' => 'form-field textarea', 'required' => 'required', 'rows' => 6 ]) }}
			</div>
			<div class="s-tag">
				{{ Form::text('tag', null, ['placeholder' => 'Start typing some tags...', 'class' => 'form-field tag', 'id' => 'tag']) }}
				<br>
			    <div id="tags">
			    </div>
				<small>Tag not showing up in the list? Enter yours, hit space and we'll add it for you!</small>
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