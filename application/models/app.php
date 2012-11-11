<?

class App extends Eloquent {

	public function builds()
	{
		return $this->has_many('Build');
	}

	public function user()
	{
		return $this->belongs_to('User');
	}
}
