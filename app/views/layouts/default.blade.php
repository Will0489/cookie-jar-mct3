<!doctype html>
<html>
	<head>
		@include('layouts.partials.head')
	</head>

	<body>
		<div class="page-wrap">
			@include('layouts.partials.navbar')
				
			@yield('content')
			
			<div class="clearfix"></div>
		</div>

		@include('layouts.partials.footer')	
	</body>
</html>