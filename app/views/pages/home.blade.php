@extends('layouts.default')

@section('content')
	@include('pages.partials.header')

	<div class="section"></div>

	<div class="section">
		<div class="col span_1_of_3 qHeading">
			<h2 class="qHeading">Latest Questions</h2>
		</div>
		<div class="col span_2_of_3">
			<p class='xs right'><a href="login">Explore All</a></p>
		</div> 
	</div>
	<div class="section group">
		@include('pages.partials.question')
		@include('pages.partials.question')
		@include('pages.partials.question')
	</div>
	<div class="section group">
		@include('pages.partials.question')
		@include('pages.partials.question')
		@include('pages.partials.question')
	</div>

	@include('pages.partials.article') 
@stop