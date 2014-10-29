 <header>
 	<nav>
 		<a href="/">COOKIE JAR</a>
 		<ul>
 			<li><img src="/assets/icons/icon-search.png" class="icon"/></li>
	 		@if(Auth::check())
	 		<li><a href="/profile" class="btn small" alt="your profile">Profile</a></li>
	 		<li><a href="/messages" alt="your messages"><img src="/assets/icons/icon-email.png" class="icon"/></a></li>
	 		<li><a href="/settings" alt="settings"><img src="/assets/icons/icon-settings.png" class="icon"/></a></li>
	 		<li><a href="/logout"  alt="sign out"><img src="/assets/icons/icon-logout.png" class="icon"/></a></li>
	 		@else
	 		<li><a href="login" class="btn small">Sign In</a></li>
	 		<li><a href="signup" class="btn small red">Sign Up</a></li>
 			@endif
 		</ul>
 	</nav>
 	
 	@if(Session::has('flash_notice'))
 		<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
 	@endif
 </header>