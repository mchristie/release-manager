@layout('layouts.admin')

@section('main')
	
	<h2>{{$title}}</h2>

	<table class="columns twelve">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Modified</th>
				<th>Edit</th>
			</tr>
		</thead>

		<tbody>
			@foreach($list as $l)
				<tr>
					<td>{{$l->id}}</td>
					<td>{{$l->title}}</td>
					<td><?php $date = strtotime($l->updated_at); echo date('d/M/Y H:i', $date); ?></td>
					<td><a href="/admin/{{$type}}/{{$l->id}}" class="button small">Edit</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<p><a href="/admin/{{$title}}/new" class="button medium">New {{$title}}</a></p>

@endsection
