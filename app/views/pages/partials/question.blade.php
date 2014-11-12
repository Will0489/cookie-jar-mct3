<div class="section group">
@foreach($latest_top as $latest)
    <div class="col span_1_of_3">
        @if($latest->categories->first()->image_url === null)
        <img src="assets/images/q1.gif" class="question">
        @else
        <img src="{{$latest->categories->first()->image_url}}" class="question">
        @endif
        <h4><a href="/questions" class="link">{{ $latest->title }}</a></h4>
        <p class="date">I need your help until {{ date('d/m/Y', strtotime($latest->deadline)) }} Get more <a href="/questions"><span class="link">info</span></a>!</p>
        <br/>
        <small><span class="left">by <a class="link-dark" href="">{{ $latest->user->first_name }} {{$latest->user->last_name}}</a></span> <span class="right">Submitted at {{ date('H:m', strtotime($latest->created_at))}} on {{ date('d/m/Y', strtotime($latest->created_at)) }}</span></small>
    </div>
@endforeach
</div>
<div class="section group">
@foreach($latest_bot as $latest)
   <div class="col span_1_of_3">
        @if($latest->categories->first()->image_url === null)
        <img src="assets/images/q1.gif" class="question">
        @else
        <img src="{{$latest->categories->first()->image_url}}" class="question">
        @endif
        <h4><a href="/questions" class="link">{{ $latest->title }}</a></h4>
        <p class="date">I need your help until {{ date('d/m/Y', strtotime($latest->deadline)) }} Get more <a href="/questions"><span class="link">info</span></a>!</p>
        <br/>
        <small><span class="left">by <a class="link-dark" href="">{{ $latest->user->first_name }} {{$latest->user->last_name}}</a></span> <span class="right">Submitted at {{ date('H:m', strtotime($latest->created_at))}} on {{ date('d/m/Y', strtotime($latest->created_at)) }}</span></small>
    </div>
@endforeach
</div>