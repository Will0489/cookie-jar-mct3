@extends('layouts.default')

@section('content')
    @if(Session::has('message'))
        {{ Session::get('message')}}
    @endif
    <div class="section">
		<div class="col span_1_of_3 qHeading">
			<h2>Explore All Questions</h2>
			@include('questions.partials.question')
		    @if (!empty($data))
		        <!-- TODO: QUESTION OVERVIEW DISPLAY -->
		    @endif
		</div>		
	</div>
@stop