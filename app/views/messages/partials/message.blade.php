@foreach($conversations as $conversation)
<li>
	<div class="msg">
		<div class="left">
			<img src="{{ $conversation->sender->photo}}" class="msg-avatar"/>
		</div>
		<div class="clearfix"></div>
		<div class="user-name">
			<span> {{ $conversation->sender->first_name}}</span>
			<div class="msg-body">
			    @foreach($conversation->messages as $message)
				<p>
				    {{$message->content}}
				</p>
				@endforeach
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</li>
@endforeach