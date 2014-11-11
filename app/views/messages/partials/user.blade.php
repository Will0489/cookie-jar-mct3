@foreach($conversations as $conversation)
<li>
	<a href="/profile" class="" alt="Profile">
		<div class="left">
			<img src="{{ $conversation->sender->photo}}" class="msg-avatar"/>
		</div>
		<div class="clearfix"></div>
		<div class="user-name">
			<span> {{ $conversation->sender->first_name }}</span>
		</div>
		<div class="clearfix"></div>
	</a>
</li>
@endforeach