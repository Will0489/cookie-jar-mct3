 <header>
 	<nav>
 		<a href="/" class="logo left"><img src="/assets/images/logo.gif"></a>
 		@if(Auth::check())
 		<ul class="left">
 			<li><a href="questions/new" class="btn small red">Ask your question!</a></li>
 		</ul>
 		@endif
 		<ul id="menu" class="nav">
 			<li>
 				<a href="#" alt="search">
 					<span class="icon"><i aria-hidden="true" class="icon-search"></i></span>
 				</a>
 			</li>
	 		@if(Auth::check())
<<<<<<< HEAD
	 		<li>
	 			<a href="/profile" class="btn small" alt="your profile">
	 				<img src="{{ $data['photo']}}" class="icon avatar"/>
	 				{{ $data['username'] }}
	 			</a>
	 		</li>
	 		<li>
 				<a href="/messages" alt="your messages">
 					<span class="icon"><i aria-hidden="true" class="icon-email"></i></span>
 				</a>
 			</li>
 			<li>
 				<a href="/logout" alt="sign out">
 					<span class="icon"><i aria-hidden="true" class="icon-logout"></i></span>
 				</a>
 			</li>
=======
	 		<li><a href="/profile" class="btn small" alt="your profile"><img src="{{ $data['photo']}}" class="icon avatar"/>{{ $data['first_name'] }}</a></li>
	 		<li><a href="/messages" alt="your messages"><img src="/assets/icons/icon-email.png" class="icon"/></a></li>
	 		<li><a href="/settings" alt="settings"><img src="/assets/icons/icon-settings.png" class="icon"/></a></li>
	 		<li><a href="/logout"  alt="sign out"><img src="/assets/icons/icon-logout.png" class="icon"/></a></li>
>>>>>>> ab3870c7e803e99460a1f6dc18248f1223290557
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
 