@layout('layouts.public')

@section('main')
	
	<h2 class="subheader">{{$app->title}}</h2>

	<blockquote>
		{{nl2br($build->changes)}}
	</blockquote>

	<div class="row">
		@foreach($files as $file)

			<div class="column three end">
				<div class="panel" id="upload_{{$file->id}}">
					<h5>{{$file->type->title}}</h5>
					
					<img src="//chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{urlencode($file->path())}}" width="200" height="200" alt="" />

					<p><a href="{{$file->path()}}">{{$file->filename}}</a></p>
				</div>
			</div>
		@endforeach
	</div>

@endsection
