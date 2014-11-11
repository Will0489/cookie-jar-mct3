@extends('layouts.default')

@section('content')
@if(Session::has('message'))
{{ Session::get('message')}}
@endif

<div class="section group">
	@if ($questions->count()) {
		<div class="col span_5_of_5">
			<h2 class="qHeading push">We could find these for ya!</h2>
		</div>
		<div class="col span_5_of_5">
			@foreach ($questions as $question)
				@include('questions.partials.question')
			@endforeach
		@else
			<p>We couldn't find anything like that :(</p>
		</div>		
	</div>
	@endif
@stop