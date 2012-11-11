@layout('layouts.admin')

@section('main')
	
	<h2>{{$title}}</h2>

	<table class="columns twelve">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Version</th>
				<th>Date</th>
				<th>Options</th>
			</tr>
		</thead>

		<tbody>
			@foreach($builds as $b)
				<tr>
					<td>{{$b->id}}</td>
					<td>{{$b->title}}</td>
					<td>{{$b->version}}</td>
					<td>{{$b->updated_at}}</td>
					<td>
						<a href="/admin/upload/{{$b->id}}" class="button small">Upload</a>
						<a href="/admin/builds/{{$b->id}}/{{$b->app_id}}" class="button small">Edit</a>
						<a href="/builds/{{$b->slug}}" class="button small">View</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	<table>
		
	<p>Create a new build from homepage.</p>

@endsection
