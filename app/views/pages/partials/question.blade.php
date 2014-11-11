<div class="section group">
@foreach($latest_top as $latest)
    <div class="col span_1_of_3">
        <img src="assets/images/q1.gif" class="question">

        <h4><a href="" class="link">{{ $latest->title }}</a></h4>
        <p class="date">I need your help until {{ date('d/m/Y', strtotime($latest->deadline)) }} Get more <span class="link">info</span>!</p>
        <br/>
        <small><span class="left">by <a class="link-dark" href="">{{ $latest->user->first_name }}</a></span> <span class="right">Submited 2h ago</span></small>
    </div>
@endforeach
</div>
<div class="section group">
@foreach($latest_bot as $latest)
    <div class="col span_1_of_3">
        <img src="assets/images/q1.gif" class="question">

        <h4><a href="" class="link">{{ $latest->title }}</a></h4>
        <p class="date">I need your help until {{ date('d/m/Y', strtotime($latest->deadline)) }} Get more <span class="link">info</span>!</p>
        <br/>
        <small><span class="left">by <a class="link-dark" href="">{{ $latest->user->first_name }}</a></span> <span class="right">Submited 2h ago</span></small>
    </div>
@endforeach
</div>