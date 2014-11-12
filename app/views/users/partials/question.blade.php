@if(!$questions->isEmpty())
    @foreach($questions as $question)
    <div class="block">
        <div class="block-image">
            <img src="{{ $question->user->photo}}" class="post-avatar"/>
            <br>
            @if(Auth::id() == $user->id)
                <a href="/profile" class="btn small center-block" alt="your profile">{{ $question->user->first_name }}</a>
            @else
                <a href="/profile/{{$user->id}}" class="btn small center-block" alt="their profile">{{ $question->user->first_name }}</a>
            @endif
        </div>
        <div class="block-body clearfix">
            <h2>{{ $question->title }}<span class="xs date"> till {{ date('d/m/Y', strtotime($question->deadline)) }} <span class="xs date right">submitted at {{ date('H:m', strtotime($question->created_at))}} on {{ date('d/m/Y', strtotime($question->created_at)) }}</span></span></h2>
            <div class="msg-body s-tag">
                <p>{{ $question->body }}</p>
            </div>
            <p>
                @foreach($question->categories as $category)
                    <span class="category btn">{{$category->name}}</span>
                @endforeach
            </p>
        </div>
        <div class="block-button">
            @if(Auth::id() == $question->user->id)
                @if($question->answered == 0)
                    <a href="/questions/{{$question->id}}/done" class="btn small blue">Done!</a>
                    <a href="/questions/{{$question->id}}/edit" class="btn small blue">Edit</a>
                    <!-- Delete / Edit / Mark as done links -->
                @else
                    <span class="small blue">Finished</span>
                @endif

            @else
                <a href="/questions/{{$question->id}}/help" class="btn small blue">I can help!</a>
            @endif
        </div>
    </div>
    @endforeach
@else
    <div>
        @if(Auth::id() == $user->id)
            <p>You haven't asked any questions yet. Ask one right now to get started!</p>
            <br>
            <p><a href="/questions/new" class="btn small red">Ask your question!</a></p>
        @else
            <p>I don't have any questions so far.</p>
        @endif
    </div>
@endif
