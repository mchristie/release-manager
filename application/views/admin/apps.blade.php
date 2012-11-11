@layout('layouts.admin')

@section('main')
	
	<h2>Apps</h2>

	<table class="columns twelve">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Modified</th>
				<th>Options</th>
			</tr>
		</thead>

		<tbody>
			@foreach($apps as $a)
				<tr>
					<td>{{$a->id}}</td>
					<td>{{$a->title}}</td>
					<td>{{$a->updated_at}}</td>
					<td>
						<a href="/admin/apps/{{$a->id}}" class="button small">Edit</a>
						<a href="/apps/{{$a->slug}}" class="button small">View public</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	<table>

	<p><a href="/admin/apps/new" class="button medium">New Apps</a></p>

@endsection
