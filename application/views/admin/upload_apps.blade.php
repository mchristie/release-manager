@layout('layouts.admin')

@section('main')
	
	<h2>Upload</h2>

	<div class="row">
		@foreach($apps as $app)

			<div class="column four end" onclick="window.location.href= '/admin/upload/{{$app->id}}'">
				<div class="panel">
				<h5>{{$app->title}}</h5>
				<p>Upload a build for {{$app->title}}.</p>
				</div>
			</div>

		@endforeach
	</div>

@endsection
