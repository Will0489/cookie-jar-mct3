@extends('layouts.default')

@section('content')
	<div class="section group">
		<div class="col span_1_of_5"></div>
		<div class="col span_3_of_5">
			<h2 class="qHeading s-tag">Messages</h2>
			<div class="msgBox">
				<!-- column for open dialogs with users -->
				<div class="usersCol">
					<ul>
						@include('messages.partials.user')
					</ul>	
				</div>
				<div class="clearfix"></div>
				<!-- column for messaging -->
				<div class="msgsCol">
					<div class="msgs">
						@include('messages.partials.message')
					</div>
					<div class="clearfix"></div>
					<!-- row for msg input field -->
					<div class="msgsRow">
						{{ Form::open(['route' => 'message.store', 'method' => 'post', 'class' => 'add_msg_form']) }}
						        @if(!$conversations->isEmpty())
						    	{{ Form::hidden('conversation_id', $conversations->first()->id) }}
						    	@else
						    	{{ Form::hidden('conversation_id', 0) }}
						    	@endif
							{{ Form::text('msg', null, ['placeholder' => 'Message...', 'class' => 'form-field']) }}
						{{ Form::close() }}
					</div>
				</div>

			</div>
		</div>
	</div>
@stop