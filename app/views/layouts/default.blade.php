<!doctype html>
<html>
	<head>
		@include('layouts.partials.head')
	</head>

	<body>
		@include('layouts.partials.navbar')

		<section>
			@yield('content')
		</section>
		
		@include('layouts.partials.footer')
	</body>
</html>