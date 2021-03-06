@foreach($questions as $question)
<div class="block">
	<div class="block-image">
		<img src="{{ $question->user->photo}}" class="post-avatar"/>
		<br/>
		<a href="/profile/{{$question->user->id}}" class="btn small center-block s-tag" alt="their profile">{{ $question->user->first_name . ' ' . $question->user->last_name}}</a>
	</div>
	
	<div class="block-body">
		<h2>{{ $question->title }}<span class="xs date"> till {{ date('d/m/Y', strtotime($question->deadline)) }} <span class="xs date right">Submitted at {{ date('H:m', strtotime($question->created_at))}} on {{ date('d/m/Y', strtotime($question->created_at)) }}</span></span> </h2>
		<div class="msg-body s-tag">
			<p>{{ $question->body }}</p>
		</div>
		<p>
		    @foreach($question->categories as $category)
		    <span class='category btn'>{{ $category->name }}</span>
		    @endforeach
	    </p>
	</div>
	
	<div class="block-button">
	@if(Auth::check())
	    @if($question->user->id == Auth::id())
	    <span class="btn small blue">This is yours.</span>
	    @else
		<a href="/questions/{{$question->id}}/help" class="btn small blue">I can help!</a>
		@endif
	@else
	    <a href="#" class="btn small blue" data-toggle="modal" data-target="#signin">Sign in to help!</a>
	@endif
	</div>
</div>
@endforeach