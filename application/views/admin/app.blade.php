@layout('layouts.admin')

@section('main')
	
	<h2>{{$app->title}}</h2>

	<form method="post" action="/admin/apps/{{$app->id}}">

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Client:</label>
			</span>
			<span class="column ten">
				<select name="user_id">
					@foreach($clients as $c)
						<option value="{{$c->id}}" @if($c->id == $app->user_id)selected@endif>{{$c->email}}</option>
					@endforeach
				</select>
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Title:</label>
			</span>
			<span class="column ten">
				<input type="text" name="title" value="{{$app->title}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Slug:</label>
			</span>
			<span class="column ten">
				<input type="text" name="slug" value="{{$app->slug}}">
			</span>
		</div>

		<div class="row">
			<span class="column two bold">
				<label class="right inline">Description:</label>
			</span>
			<span class="column ten">
				<textarea name="description">{{$app->description}}</textarea>
			</span>
		</div>

		<p><input type="submit" class="button medium" value="Save"></p>

	</form>

@endsection
