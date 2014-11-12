@foreach($questions as $question)
<div class="block">
	<div class="block-image">
		<img src="{{ $data['photo']}}" class="post-avatar"/>
		<br/>
		<a href="/profile" class="btn small center-block" alt="your profile">{{ $data['first_name'] }}</a>
	</div>
	<div class="block-body clearfix">
		<h2>{{ $question->title }}<span class="xs date"> till {{ date('d/m/Y', strtotime($question->deadline)) }} <span class="xs date right">submited 2 hours ago</span></span></h2>
		<div class="msg-body s-tag">
			<p>{{ $question->body }}</p>
		</div>
		<p>
			@foreach($question->categories as $category)
			<span class="category btn">{{$category->name}}</span>
			@endforeach
		</p>
	</div>

	<div class="block-button">
		@if($question->answered == 0)
		<a href="/questions/{{$question->id}}/done" class="btn small blue">Done!</a>
		<a href="/questions/{{$question->id}}/edit" class="btn small blue">Edit</a>
		@else
		<span class="btn small blue">Finished</span>
		@endif
	</div>
</div>
@endforeach