<!doctype html>
<html lang="en" class="no-js">
	<head>
		@include('layouts.partials.head')
	</head>

	<body>
	@if (!Auth::check())
			@include('sessions.partials.modal')
			@include('users.partials.modal')
	 @endif	
		<div class="page-wrap">
			@include('layouts.partials.navbar')

			@yield('content')
			
			<div class="clearfix"></div>
		</div>

		@include('layouts.partials.footer')	
		
	</body>
</html>