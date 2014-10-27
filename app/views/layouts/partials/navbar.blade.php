 <header>
 	<nav>
 		<a href="/">COOKIE JAR</a>
 		<ul>
 			<li><img src="/assets/icons/icon-search.png" class="icon"/></li>
	 		@if(Auth::check())
	 		<li><a href="/profile">Profile</a></li>
	 		<li><a href="/messages">Messages</a></li>
	 		<li><a href="/settings">Settings</a></li>
	 		<li><a href="/logout">Log out</a></li>
	 		@else
	 		<li><a href="login" class="btn">Sign In</a></li>
	 		<li><a href="signup" class="btn red">Sign Up</a></li>
 			@endif
 		</ul>
 	</nav>
 	
 	@if(Session::has('flash_notice'))
 		<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
 	@endif
 </header>