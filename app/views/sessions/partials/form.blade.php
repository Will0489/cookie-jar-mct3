
		{{ Form::open(['route' => 'sessions.store', 'class' => 'form-group']) }}
			<h1>Sign In</h1>
			<div class='btn fb big'>
				<a href="/login/fb">Sign In with Facebook</a>
			</div>  
			<div class="separator">
				<span class="div-line" ></span><p class="divider xs">or</p><span class="div-line" ></span>
			</div>   

			<div>
				{{ Form::text('email', null, ['placeholder' => 'Email address', 'class' => 'form-field', 'required' => 'required']) }}
			</div>

			<div>
				{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-field', 'required' => 'required']) }}
			</div>

			<div>
				{{ Form::submit('Sign In', ['class' => 'btn red xxl']) }}
			</div>
			<div>
				@if($errors->any())
				<p class='xs'>{{$errors->first()}}</p>
				<br/>
				@endif
			</div>
			<br/>
		{{ Form::close() }}
		<p class='xs'>Need an account? <a href="#" class="link" data-toggle="modal" data-target="#signup">Sign Up</a></p>
