<div id="sb-search" class="sb-search">
<!-- 	<form action="" autocomplete="on">
			<input class="sb-search-input" placeholder="Find you what?" type="text" value="" name="search" id="search">
			<input class="sb-search-submit" type="submit" value="">
			<span class="icon"><i aria-hidden="true" class="icon-search"></i></span>
	</form> -->
	{{ Form::open(['method' => 'GET', 'route' => 'results']) }}
		{{Form::input('search', 'q', null, ['placeholder' => "Find you what?", 'class'=>"sb-search-input"])}}
		<span class="icon"><i aria-hidden="true" class="icon-search"></i></span>
	{{ Form::close() }}

</div>