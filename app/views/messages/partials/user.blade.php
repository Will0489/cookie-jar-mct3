@if(!$conversations->isEmpty())
@foreach($conversations as $conversation)
    @if(Auth::id() != $conversation->collaborator->id)
    <!-- If the user is the owner, show the collaborator -->
        <li>
            <a href="/profile" class="" alt="Profile">
                <div class="left">
                    <img src="{{ $conversation->collaborator->photo}}" class="msg-avatar"/>
                </div>
                <div class="clearfix"></div>
                <div class="user-name">
                    <span> {{ $conversation->collaborator->first_name }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
    @else
    <!-- Else if the user is the collaborator, show the owner -->
        <li>
            <a href="/profile" class="" alt="Profile">
                <div class="left">
                    <img src="{{ $conversation->owner->photo}}" class="msg-avatar"/>
                </div>
                <div class="clearfix"></div>
                <div class="user-name">
                    <span> {{ $conversation->owner->first_name }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
    @endif
@endforeach
@else
<li>
		<div>
			<span>No conversations so far.</span>
		</div>
		<div class="clearfix"></div>
</li>
@endif