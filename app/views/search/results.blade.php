@extends('layouts.default')

@section('content')
@if(Session::has('message'))
{{ Session::get('message')}}
@endif

<div class="section group">
	@if (!$questions->isEmpty())
		<div class="col span_5_of_5">
			<h2 class="qHeading push">We found these for you!</h2>
		</div>
		<div class="col span_5_of_5">
			@include('questions.partials.question')
        </div>
	@else
		<div class="col span_5_of_5">
			<h2 class="qHeading push">Unfortunately we couldn't find what you were looking for.</h2>
		</div>
		<div class="col span_5_of_5">
			<p>We couldn't find anything like that matched your wish :(</p>
		</div>		

	@endif
</div>
@stop