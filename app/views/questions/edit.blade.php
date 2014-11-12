@extends('layouts.default')

@section('content')


    @if (!empty($data))
       
       {{ Form::open(['route' => 'question.update', 'method' => 'PUT']) }}
       <div class="section group">
       	<div class="col span_1_of_5"></div>
		<div class="col span_3_of_5">
			<h2>Edit your question</h2>
            @if(Session::has('message'))
                {{ Session::get('message')}}
            @endif
            <br><br>
			<div>
				{{ Form::text('title', $question->title, ['placeholder' => 'Title', 'class' => 'form-field', 'required' => 'required']) }}
			</div>

			<div>
				{{ Form::text('deadline', date('d/m/Y', strtotime($question->deadline)), ['placeholder' => 'I can use some help till  dd.mm.yyyy', 'class' => 'form-field', 'required' => 'required']) }}
			</div>
			<div>
				{{ Form::textarea('body', $question->body, ['placeholder' => 'Specify your question in 300 characters', 'class' => 'form-field textarea', 'required' => 'required', 'rows' => 8 ]) }}
			    {{ Form::hidden('question_id', $question->id) }}
			</div>
			<div class="s-tag">
				{{ Form::text('tag', null, ['placeholder' => 'Start typing some tags...', 'class' => 'form-field tag', 'id' => 'tag']) }}
				<br>
                <div id="existing tags">
                    @foreach($question->categories as $category)
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
				{{ Form::submit('Update', ['class' => 'btn blue big']) }}
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