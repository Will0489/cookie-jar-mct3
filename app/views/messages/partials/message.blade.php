@if(!$conversations->isEmpty())
    @foreach($conversations as $conversation)
        @foreach($conversation->messages as $message)
            <li>
                <div class="msg">
                    <div class="left">
                        <img src="{{ $message->user->photo}}" class="msg-avatar"/>
                    </div>
                    <div class="clearfix"></div>
                    <div class="user-name">
                        <span> {{ $message->user->first_name}}</span>
                        <div class="msg-body">
                            <p>
                                {{$message->content}}
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </li>
        @endforeach
    @endforeach
@else
<li>
	<div class="msg">

				<p>No messages so far.</p>

		<div class="clearfix"></div>
	</div>
</li>
@endif