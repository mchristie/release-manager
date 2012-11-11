@layout('layouts.public')

@section('main')
	
	<h2 class="subheader">{{$client->email}} - {{$app->title}}</h2>

	<table class="columns twelve">
		<thead>
			<tr>
				<th>Title</th>
				<th>Version</th>
				<th>Date</th>
				<th>Downloads</th>
			</tr>
		</thead>

		<tbody>
			@foreach($builds as $b)
				<tr>
					<td>{{$b->title}}</td>
					<td>{{$b->version}}</td>
					<td>{{$b->updated_at}}</td>
					<td>
						<a href="/builds/{{$b->slug}}" class="button small">View</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	<table>

@endsection
