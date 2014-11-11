 <header class="header">
 		<a href="/" class="logo left no"><img src="/assets/images/logo.gif"></a>
 		@if(Auth::check())
 		<ul class="left no">
 			<li><a href="questions/new" class="btn small red">Ask your question!</a></li>
 		</ul>
 		@endif
 		<nav id="menu" class="nav">
	 		<ul>
	 			<li>
	 				<a href="#" data-alt="">
	 					@include('layouts.partials.search')
	 				</a>
	 			</li>
		 		@if(Auth::check())
		 		 <li class='no'>
		 			<a href="/profile" class="" alt="Profile">
		 				<img src="{{ $data['photo']}}" class="thumbnail"/>
		 			</a>
		 		</li>
		 		<li>
		 			<a href="/profile" class="btn small link-dark" data-alt="Profile">
		 				<span class="icon no"> {{ $data['first_name'] }}</span>
		 			</a>
		 		</li>
		 		<li>
	 				<a href="/messages" data-alt="Messages" >
	 					<span class="icon no"><i aria-hidden="true" class="icon-email"></i></span>
	 				</a>
	 			</li>
	 			<li>
	 				<a href="/logout" data-alt="Sign out">
	 					<span class="icon no"><i aria-hidden="true" class="icon-logout"></i></span>
	 				</a>
	 			</li>
		 		@else
		 		<li><a href="#" class="btn small link-dark" data-toggle="modal" data-target="#signin">Sign In</a></li>
		 		<li><a href="#" class="btn small red" data-toggle="modal" data-target="#signup">Sign Up</a></li>
	 			@endif
	 		</ul>
 		</nav>
 	
 	@if(Session::has('flash_notice'))
 		<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
 	@endif
 </header>
