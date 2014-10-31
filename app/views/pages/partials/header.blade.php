
<img src="assets/images/header.gif" class="cover image"/>
<div class="section group" id="welcome">
	<div class="col span_3_of_3">
		<h1 class="h-white">Cookie Jar is for Creators and Makers</h1>
		<p class="p-white">Do you need a model for your photoshoot? </p>
		<p class="p-white">Or you are a web ninja in need of project for your portfolio?</p>
		<p class="p-white">Here you can ask for help your fellow students!</p>
		<br/>
		<br/>
		@if(Auth::check())
			<a href="signup" class="btn xxxl red">Ask your question</a>
		@else
			<a href="signup" class="btn xxxl red">Sign Up</a>
		@endif
	</div>
</div>