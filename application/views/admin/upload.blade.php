@layout('layouts.admin')

@section('main')
	
	<h2>{{$app->title}}</h2>


	<div class="row">
		@foreach($types as $type)

			<div class="column four end">
				<div class="panel" id="upload_{{$type->id}}">
					<h5>{{$type->title}}</h5>
					<p>Drop a file here to upload for {{$type->title}}.</p>

					<div class="progress twelve" id="progress_{{$type->id}}" style="opacity: 0;"><span class="meter"></span></div>
				</div>
			</div>

			@section('additional_js')
				@parent

				<script>
					$('#upload_{{$type->id}}').filedrop({
						// The name of the $_FILES entry:
						paramname: 'upload',
						
						maxfiles: 1,
				    	maxfilesize: 100,
						url: '/admin/do_upload/{{$build->id}}/{{$type->id}}',

						uploadFinished:function(i,file,response) {
							$("#progress_{{$type->id}} .meter").text('Complete');
							
							if (!response.success) alert(response);
						},
						
				    	error: function(err, file) {
							switch(err) {
								case 'BrowserNotSupported':
									showMessage('Your browser does not support HTML5 file uploads!');
									break;
								case 'TooManyFiles':
									alert('Too many files! Please select 5 at most! (configurable)');
									break;
								case 'FileTooLarge':
									alert(file.name+' is too large! Please upload files up to 2mb (configurable).');
									break;
								default:
									break;
							}
						},
						
						uploadStarted:function(i, file, len) {
							$("#progress_{{$type->id}} .meter").css('width', '0%');
							$("#progress_{{$type->id}}").css('opacity', 1);
						},
						
						progressUpdated: function(i, file, progress) {
							if (progress > 10) {
								$("#progress_{{$type->id}} .meter").text(progress+'%');
							}
							$("#progress_{{$type->id}} .meter").css('width', progress+'%');
						}
				    	 
					});
				</script>
			@endsection

		@endforeach
	</div>

@endsection
