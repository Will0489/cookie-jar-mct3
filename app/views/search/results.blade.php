@extends('layouts.default')

@section('content')
@if(Session::has('message'))
{{ Session::get('message')}}
@endif

<div class="section group">
	@if ($questions->count()) {
		<div class="col span_5_of_5 msg-block">
			<h2 class="qHeading push">We could find these for ya!</h2>
		</div>
		<div class="col span_5_of_5 msg-block">
			@foreach ($questions as $question)
				@include('questions.partials.question')
			@endforeach
		</div>
		@else
		<div class="col span_5_of_5 msg-block">
			<p>We couldn't find anything like that :(</p>
		</div>		
	</div>
	@endif
@stop