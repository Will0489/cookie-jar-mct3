@extends('layouts.default')

@section('content')
	@include('pages.partials.header')

	<div class="section"></div>

	<div class="section">
		<div class="col span_3_of_3 qHeading">
			<h2 class="qHeading left">Latest Questions</h2><p class='xs right date'><a href="questions" class="link-dark">Explore All</a></p>
		</div>
	</div>

    @include('pages.partials.question')

	@include('pages.partials.article')
	
@stop