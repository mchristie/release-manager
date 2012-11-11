<?

class FileUpload extends Eloquent {

	public static $table = 'files';

	public function build()
	{
		return $this->belongs_to('Build');
	}

	public function type()
	{
		return $this->belongs_to('Type');
	}

	public function path()
	{
		return URL::to( "uploads/{$this->app_id}/{$this->build_id}/{$this->type_id}/{$this->filename}" );
	}
}
