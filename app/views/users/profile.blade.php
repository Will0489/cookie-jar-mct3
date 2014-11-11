@extends('layouts.default')

@section('content')
    	<div class="section group">
		@include('users.partials.profile')
	    </div>

	<div class="section group">
		<div class="col span_5_of_5">
			<h2 class="qHeading push"> My Questions </h2>
		</div>
		<div class="col span_5_of_5">
			@include('users.partials.question')
		</div>
	</div>
@stop