@layout('layouts.admin')

@section('main')
	
	<h2>{{$client->email}}</h2>

	<form method="post" action="/admin/clients/{{$client->id}}">

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Role:</label>
			</span>
			<span class="column ten" style="line-height:28px;">
				<select name="role">
					<option value="admin"@if($client->role == 'admin')selected@endif>Admin</option>
					<option value="client"@if($client->role == 'client')selected@endif>Client</option>
				</select>
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Name:</label>
			</span>
			<span class="column ten">
				<input type="text" name="email" value="{{$client->email}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Slug:</label>
			</span>
			<span class="column ten">
				<input type="text" name="slug" value="{{$client->slug}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Password:</label>
			</span>
			<span class="column ten">
				<input type="text" name="password" value="">
			</span>
		</div>

		<p><input type="submit" class="button medium" value="Save"></p>

	</form>

@endsection
