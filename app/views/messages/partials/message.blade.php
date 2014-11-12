@if(!$conversations->isEmpty())
    @foreach($conversations as $conversation)
        @if($conversations->first()->id == $conversation->id)
        <ul class="active-chat" data-id="{{$conversation->id}}" style="display:block">
        @else
        <ul class="hidden-chat" data-id="{{$conversation->id}}" style="display:none">
        @endif
            <li>{{$conversation->question->title}}</li>
            @foreach($conversation->messages as $message)
                <li>
                    <div class="msg">
                        <div class="left">
                            <img src="{{ $message->user->photo }}" class="msg-avatar"/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="user-name">
                            <span> {{ $message->user->first_name}} sent on {{ date('d/m/Y', strtotime($message->created_at)) }} at {{ date('H:m', strtotime($message->created_at)) }}</span>
                            <div class="msg-body">
                                <p>
                                    {{{$message->content}}}
                                </p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endforeach
@else
    <ul>
        <li>
            <div class="msg">
                        <p>No messages so far.</p>
            </div>
            <div class="clearfix"></div>

        </li>
    </ul>
@endif