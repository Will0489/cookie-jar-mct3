@extends('layouts.default')

@section('content')
@if(Session::has('message'))
{{ Session::get('message')}}
@endif

<div class="section group">
	<div class="col span_5_of_5">
		<h2 class="qHeading "> Explore All Questions </h2>
	</div>
	<div class="col span_5_of_5">
		@include('questions.partials.question')
		@if (!empty($data))
		@endif
	</div>		
</div>
@stop