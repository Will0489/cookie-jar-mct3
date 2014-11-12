@if(!$conversations->isEmpty())
@foreach($conversations as $conversation)
    @if(Auth::id() != $conversation->collaborator->id)
    <!-- If the user is the owner, show the collaborator -->
        <li class="conversation" data-conversation="{{$conversation->id}}">
            <div class="left">
                <img src="{{ $conversation->collaborator->photo}}" class="msg-avatar"/>
            </div>
            <div class="clearfix"></div>
            <div class="user-name">
                <span> {{ $conversation->collaborator->first_name }}</span>
            </div>
            <div class="clearfix"></div>
        </li>
    @else
    <!-- Else if the user is the collaborator, show the owner -->
        <li class="conversation" data-conversation="{{$conversation->id}}">
            <div class="left">
                <img src="{{ $conversation->owner->photo}}" class="msg-avatar"/>
            </div>
            <div class="clearfix"></div>
            <div class="user-name">
                <span> {{ $conversation->owner->first_name }}</span>
            </div>
            <div class="clearfix"></div>
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