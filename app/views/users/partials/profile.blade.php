<div class="col span_1_of_3 ">
	<img  class="avatar" src="@if($data->photo != NULL) {{ $data->photo }} @endif" />
</div>
<div class="col span_2_of_3">
	<div >
		<h2 class="qHeading"> {{ $data->first_name . ' ' . $data->last_name }} <p class='right'><a class="link-dark xs" href="edit">Edit</a></p></h2>
		<br/>
		<p>Studying MTA, web dev & UX '@KdG' </p>
		<p>My portfolio</p>
		<p>I'm passionate about:</p>

		<p><a class='category btn' href="">web</a> <a class='category btn' href="">photography</a> <a href="" class='category btn'>design</a></p>
	</div>
</div>