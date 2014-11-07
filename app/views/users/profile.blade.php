@extends('layouts.default')

@section('content')
    	<div class="section group">
		<div class="col span_1_of_5">
			<img  class="right question avatar" src="@if($data->photo != NULL) {{ $data->photo }} @endif" />
		</div>
		<div class="col span_2_of_5">
			<h2 class="qHeading"> {{ $data->username }} </h2>
			<br/>
			<p>Studying MTA, web dev & UX '@KdG' </p>
			<p>My portfolio</p>
			<p>I'm passionate about:</p>
			
			<p><a class='category btn' href="">web</a> <a class='category btn' href="">photography</a> <a href="" class='category btn'>design</a></p>
			
		</div>
		<div class="col span_1_of_5">
			<p class='right'><a class="link-dark" href="">Edit</a></p>
		</div>
	</div>
	<div class="section group">
		<div class="col span_2_of_12">
			<h2 class="qHeading right"> My Questions </h2>
		</div>
	</div>
@stop