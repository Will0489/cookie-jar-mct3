@extends('layouts.default')

@section('content')
<div class="section group">
	<div class="col span_5_of_5">
		<h2 class="qHeading "> Explore All Questions </h2>
		@if(Session::has('message'))
		<br>
        <p>{{ Session::get('message')}}</p>
        @endif
	</div>
	<div class="col span_5_of_5">
		@include('questions.partials.question')
		@if (!empty($data))
		@endif
	</div>		
</div>
@stop