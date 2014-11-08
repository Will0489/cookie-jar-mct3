 <header>
 	<nav>
 		<a href="/" class="logo left"><img src="/assets/images/logo.gif"></a>
 		@if(Auth::check())
 		<ul class="left">
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
	 			<a href="/profile" class="btn small link-dark" alt="Profile">
	 				<span class="icon"> {{ $data['username'] }}</span>
	 			</a>
	 		</li>
	 		<li>
 				<a href="/messages" data-alt="Messages" >
 					<span class="icon"><i aria-hidden="true" class="icon-email"></i></span>
 				</a>
 			</li>
 			<li>
 				<a href="/logout" data-alt="Sign out">
 					<span class="icon"><i aria-hidden="true" class="icon-logout"></i></span>
 				</a>
 			</li>
	 		@else
	 		<li><a href="login" class="btn small link-dark">Sign In</a></li>
	 		<li><a href="signup" class="btn small red">Sign Up</a></li>
 			@endif
 		</ul>
 		</nav>
 	</nav>
 	
 	@if(Session::has('flash_notice'))
 		<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
 	@endif
 </header>
 