@foreach($questions as $question)
<div class="block">
	<div class="block-image">
		<img src="{{ $question->user->photo}}" class="post-avatar"/>
		<br/>
		<a href="/profile" class="btn small center-block s-tag" alt="your profile">{{ $question->user->first_name . ' ' . $question->user->last_name}}</a>
	</div>
	
	<div class="block-body">
		<h2>{{ $question->title }}<span class="xs date"> till {{ date('d/m/Y', strtotime($question->deadline)) }} <span class="xs date right">submitted 2 hours ago</span></span> </h2>
		<div class="msg-body s-tag">
			<p>{{ $question->body }}</p>
		</div>
		<p>
			@foreach($question->categories as $category)
			<a class='category btn' href="">{{ $category->name }}</a>
			@endforeach
		</p>
	</div>
	
	<div class="block-button">
		@if($question->user->id == Auth::id())
		<span>This is yours</span>
		@else
		<a href="/questions/{{$question->id}}/help" class="btn small blue">I can help!</a>
		@endif
	</div>
</div>
@endforeach