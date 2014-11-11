@foreach($conversations as $conversation)
<li>
	<a href="/profile" class="" alt="Profile">
		<div class="left">
			<img src="{{ $conversation->user_id->photo}}" class="msg-avatar"/>
		</div>
		<div class="clearfix"></div>
		<div class="user-name">
			<span> {{ $data['first_name'] }}</span>
		</div>
		<div class="clearfix"></div>
	</a>
</li>
@endforeach