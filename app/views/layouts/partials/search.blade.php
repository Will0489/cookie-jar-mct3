<div id="sb-search" class="sb-search">
	{{ Form::open(['method' => 'GET', 'route' => 'results']) }}
		{{Form::input('search', 'q', null, ['placeholder' => "Find you what?", 'class'=>"sb-search-input"])}}
		<span class="icon"><i aria-hidden="true" class="icon-search"></i></span>
	{{ Form::close() }}
</div>