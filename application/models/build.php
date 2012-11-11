<?

class Build extends Eloquent {

	public function app()
	{
		return $this->belongs_to('App');
	}

	public function fileuploads()
	{
		return $this->has_many('FileUpload');
	}

}
