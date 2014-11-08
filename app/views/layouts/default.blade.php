<!doctype html>
<html>
	<head>
		@include('layouts.partials.head')
	</head>

	<body>
		<div class="page-wrap">
			@include('layouts.partials.navbar')

			@if (!Auth::check())
				@include('sessions.partials.modal')
				@include('users.partials.modal')
			@endif

			@yield('content')
			
			<div class="clearfix"></div>
		</div>

		@include('layouts.partials.footer')	
		
	</body>
</html>