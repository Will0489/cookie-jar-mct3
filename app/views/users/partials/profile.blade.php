<div class="col span_1_of_3 ">
	<img  class="avatar" src="@if($data->photo != NULL) {{ $data->photo }} @endif" />
</div>
<div class="col span_2_of_3">
	<div>
		<h2 class="qHeading"> {{ $data->first_name . ' ' . $data->last_name }} <p class='right'><a class="link-dark xs" href="edit">Edit</a></p></h2>
		<br/>
		@if($data->studies_at)
		<p>  Studying {{ $data->studies_at  }} </p>
		@else
		<p> Tell the world where the best place for the makers is! (We mean where you are studying) </p>
		@endif
		@if($data->portfolio)
		<p>  Check my portfolio @ {{ $data->portfolio  }} </p>
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