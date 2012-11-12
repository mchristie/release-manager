@layout('layouts.public')

@section('main')
	<div class="columns twelve">
		<h2 class="subheader">{{$client->email}}</h2>

		<div class="row">
			@foreach($apps as $app)

				<div class="column four end" onclick="window.location.href= '/apps/{{$app->slug}}'">
					<div class="panel app_pannel">
					<h5>{{$app->title}}</h5>
					<p>View builds for {{$app->title}}.</p>
					</div>
				</div>

			@endforeach
		</div>
</div>

@endsection
