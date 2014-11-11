<div class="col span_1_of_3 ">
	<img  class="avatar" src="@if($data->photo != NULL) {{ $data->photo }} @endif" />
</div>
<div class="col span_2_of_3">
	<div >
		<h2 class="qHeading"> {{ $data->first_name . ' ' . $data->last_name }} <p class='right'><a class="link-dark xs" href="edit">Edit</a></p></h2>
		<br/>
		<p>{{ $data->studies_at }} </p>
		<p><a href="http://{{ $data->portfolio }}">{{$data->portfolio}}</a></p>
		<p>
		    @foreach($data->categories as $category)
                <span class="category btn">{{$category->name}}</span>
		    @endforeach
		</p>
	</div>
</div>