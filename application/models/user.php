<?

class User extends Eloquent {

	public static $table = 'users';

	public function apps()
	{
		return $this->has_many('App');
	}

	public function generate_token()
	{
		$this->set_attribute('token', Str::random(200));
		$this->save();
		return $this->get_attribute('token');
	}

	public function get_token()
	{
		if (!$this->get_attribute('token')) $this->generate_token();
		return $this->get_attribute('token');
	}
}
