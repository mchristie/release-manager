@layout('layouts.admin')

@section('main')
	
	<h2>{{$build->title}}</h2>
	<h4 class="subheader">{{$app->title}}</h4>

	<form method="post" action="/admin/builds/{{$build->id}}/{{$app->id}}">

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Title:</label>
			</span>
			<span class="column ten">
				<input type="text" name="title" value="{{$build->title}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Slug:</label>
			</span>
			<span class="column ten">
				<input type="text" name="slug" value="{{$build->slug}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Version:</label>
			</span>
			<span class="column ten">
				<input type="text" name="version" value="{{$build->version}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Changes:</label>
			</span>
			<span class="column ten">
				<textarea name="changes">{{$build->changes}}</textarea>
			</span>
		</div>

		<p><input type="submit" class="button medium" value="Save"></p>

	</form>

@endsection
