@extends('_layouts.default')

@section('main')

	<div id="register" class="register">
		{{ Form::open() }}

			@if ($errors->has('register'))
				<div class="alert alert-error">{{ $errors->first('register', ':message') }}</div>
			@endif

			<div class="control-group">
				{{ Form::label('fname', 'First Name') }}
				<div class="controls">
					{{ Form::text('fname') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('lname', 'Last Name') }}
				<div class="controls">
					{{ Form::text('lname') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('email', 'Email') }}
				<div class="controls">
					{{ Form::text('email') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('password1', 'Password') }}
				<div class="controls">
					{{ Form::password('password1') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('password2', 'Repeat Password') }}
				<div class="controls">
					{{ Form::password('password2') }}
				</div>
			</div>

			<div class="form-actions">
				{{ Form::submit('Register', array('class' => 'btn btn-inverse btn-login')) }}
				or <a href="{{ URL::route('login') }}"> Login </a> if you already have an account .
			</div>

		{{ Form::close() }}
	</div>

@stop