@layout('layouts.admin')

@section('main')
	
	<h2>{{$title}}</h2>

	<table class="columns twelve">
		<thead>
			<tr>
				<th>App</th>
				<th>Title</th>
				<th>Version</th>
				<th style="width:130px;">Date</th>
				<th style="width:210px;">Options</th>
			</tr>
		</thead>

		<tbody>
			@foreach($builds as $b)
				<tr>
					<td>{{$b->app->title}}</td>
					<td>{{$b->title}}</td>
					<td>{{$b->version}}</td>
					<td style="width:130px;"><?php $date = strtotime($b->updated_at); echo date('d/M/Y H:i', $date); ?></td>
					<td style="width:210px;">
						<a href="/admin/upload/{{$b->id}}" class="button small">Upload</a>
						<a href="/admin/builds/{{$b->id}}/{{$b->app_id}}" class="button small">Edit</a>
						<a href="/builds/{{$b->slug}}" class="button small">View</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		
	<p>Create a new build from homepage.</p>

@endsection
