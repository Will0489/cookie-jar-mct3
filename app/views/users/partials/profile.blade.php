@if(Auth::id() == $user->id)
<!-- Show own profile -->
<div class="col span_1_of_3 ">
	<img  class="avatar" src="@if($data->photo != NULL) {{ $data->photo }} @endif" />
</div>
<div class="col span_2_of_3">
	<div>
		<h2 class="qHeading"> {{ $data->first_name . ' ' . $data->last_name }} <p class='right'><a class="link-dark xs" href="edit">Edit</a></p></h2>
		<br>
		
		@if($data->studies_at)
		<p>  Studying {{ $data->studies_at  }} </p>
		<br>
		@else
		<p> Tell the world where the best place for the makers is. (We mean where you're studying) </p>
		<br>
		@endif
		
		@if($data->portfolio)
		<p>  Check my portfolio @<a href="http://{{ $data->portfolio }}">{{$data->portfolio}}</a> </p>
		<br>
		@else
		<p>Add a portfolio link to display your projects and skills.</p>
		<br>
		@endif
		
		@if($data->categories)
		<p>I'm passionate about:</p>
		<div id="tags">
			@foreach($data->categories as $category)
			<span class="category btn">{{$category['name']}}</span>
			<input type="hidden" name="tagvalues[]" value="{{$category['id']}}">
			@endforeach
		</div>
		@else
		<p>Add some tags to show people what you're passionate about.</p>
		@endif
	</div>
</div>
@else
<!-- Show public profile -->
<div class="col span_1_of_3 ">
	<img  class="avatar" src="@if($user->photo != NULL) {{ $user->photo }} @endif" />
</div>
<div class="col span_2_of_3">
	<div>
		<h2 class="qHeading"> {{ $user->first_name . ' ' . $user->last_name }}</h2>
		<br>
		@if($user->studies_at)
		<p>  Studying {{ $user->studies_at  }} </p>
		<br>
		@endif

		@if($user->portfolio)
		<p>  Check my portfolio @<a href="http://{{ $user->portfolio }}">{{$user->portfolio}}</a> </p>
		<br>
		@endif

		@if($data->categories)
		<p>I'm passionate about:</p>
		<div id="tags">
			@foreach($data->categories as $category)
			<span class="category btn">{{$category['name']}}</span>
			<input type="hidden" name="tagvalues[]" value="{{$category['id']}}">
			@endforeach
		</div>
		@endif
	</div>
</div>
@endif