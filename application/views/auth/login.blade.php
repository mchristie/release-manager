@layout('layouts.public')

@section('main')
	<div id="login_form">
	<h2 class="subheader">Login</h2>

	@if($error)
		<div class="alert-box alert">{{$error}}</div>
	@endif

	<form method="post" action="/auth/login">

		<div class="row">
			<div class="one columns">
				<label class="right inline">Username:</label>
			</div>
			<div class="ten columns">
				<input type="text" name="email" placeholder="Username" class="eight" /> 
			</div>
		</div>

		<div class="row">
			<div class="one columns">
				<label class="right inline">Password:</label>
			</div>
			<div class="ten columns">
				<input type="password" name="password" placeholder="Password" class="eight" /> 
			</div>
		</div>

		<div class="row">
			<div class="one columns">
				
			</div>
			<div class="ten columns">
				<label class="left inline">Remember me:</label>
				<span style="line-height:28px;"><input type="checkbox" name="remember_me" value="1" class="one" /> </span>
			</div>
		</div>


		<div class="row">
			<div class="one columns">

			</div>
			<div class="ten columns">
				<input type="submit" class="button medium" value="Login">
			</div>
		</div>

	</form>
</div>

@endsection
