@extends('layouts.default')

@section('content')
    	<div class="section group">
		<div class="col span_1_of_3 ">
			<img  class="avatar" src="@if($data->photo != NULL) {{ $data->photo }} @endif" />
		</div>
		<div class="col span_2_of_3">
			<div >
				<h2 class="qHeading"> {{ $data->username }} <p class='right'><a class="link-dark xs" href="">Edit</a></p></h2>
				<br/>
				<p>Studying MTA, web dev & UX '@KdG' </p>
				<p>My portfolio</p>
				<p>I'm passionate about:</p>
				
				<p><a class='category btn' href="">web</a> <a class='category btn' href="">photography</a> <a href="" class='category btn'>design</a></p>
			</div>
		</div>
	</div>

	<div class="section group">
		<div class="col span_5_of_5">
			<h2 class="qHeading push"> My Questions </h2>
		</div>
		<div class="col span_5_of_5">
			
			@include('users.partials.question')
			@include('users.partials.question')
			
		</div>
	</div>
@stop