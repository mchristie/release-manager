@layout('layouts.admin')

@section('main')
	
	<h2>{{$type->title}}</h2>

	<form method="post" action="/admin/types/{{$type->id}}">

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Ttile:</label>
			</span>
			<span class="column ten">
				<input type="text" name="title" value="{{$type->title}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Description:</label>
			</span>
			<span class="column ten">
				<textarea name="description">{{$type->description}}</textarea>
			</span>
		</div>

		<p><input type="submit" class="button medium" value="Save"></p>

	</form>

@endsection
