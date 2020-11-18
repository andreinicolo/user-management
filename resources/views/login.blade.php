@extends('app')

@section('content')
	<h4>Login</h4>

	@if($errors->any())
		<p>{{ $errors->first() }}</p>
	@endif

	<form name="login-form" action="{{ route('login.post') }}" method="POST">
		@csrf()
		<div class="row">
			<div class="col-md-2">
				<label for="username">Username</label>
			</div>
			<div class="col-md-10">
				<input type="text" name="username" required>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				<label for="password">Password</label>
			</div>
			<div class="col-md-10">
				<input type="password" name="password" required>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>

	</form>
@endsection