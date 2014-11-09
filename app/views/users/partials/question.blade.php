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
		<p><a class='category btn' href="">web</a> <a class='category btn' href="">photography</a> <a href="" class='category btn'>design</a></p>
	</div>

	<div class="block-button">
		<a href="" class="btn small blue">Done!</a>
		<!-- Delete / Edit / Mark as done links -->
	</div>
</div>
@endforeach