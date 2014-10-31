@extends('layouts.default')

@section('content')
<!-- <h3>Your profile</h3>
    <p><img src="@if($data->photo != NULL) {{ $data->photo }} @endif" /></p>
    <p>Welcome back {{ $data->username }}. Your profile details can be found below.</p>
    <p>You registered @if ($data->password == "") via Facebook @endif using {{ $data->email }} on {{ $data->created_at }}</p>
 -->
    	<div class="section group">
		<div class="col span_1_of_5">
			<img  class="right question" src="@if($data->photo != NULL) {{ $data->photo }} @endif" />
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
			<p class='right'><a href="">Edit</a></p>
		</div>
	</div>
	<div class="section group">
		<div class="col span_1_of_3">
			<h2 class="qHeading"> My Questions </h2>
		</div>
	</div>
@stop