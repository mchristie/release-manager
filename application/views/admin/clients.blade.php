@layout('layouts.admin')

@section('main')
	
	<h2>Clients</h2>

	<table class="columns twelve">
		<thead>
			<tr>
				<th>ID</th>
				<th>Role</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Options</th>
			</tr>
		</thead>

		<tbody>
			@foreach($clients as $c)
				<tr>
					<td>{{$c->id}}</td>
					<td>{{$c->role}}</td>
					<td>{{$c->email}}</td>
					<td>{{$c->slug}}</td>
					<td>
						<a href="/admin/clients/{{$c->id}}" class="button small">Edit</a>
						<a href="/clients/{{$c->slug}}" class="button small">View public</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	<table>

	<p><a href="/admin/clients/new" class="button medium">New Client</a></p>

@endsection
