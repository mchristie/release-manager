<?php

class Auth_Controller extends Controller
{
	public function action_login()
	{
		if ($token = Cookie::get('user_token'))
		{
			$user = User::where_token($token)->first();
			if ($user)
			{
				Auth::login($user->id);
				return $this->redirect($user->role);
			}
			else
			{
				Cookie::forget('user_token');
			}
		}

		if (Input::get('email') || Input::get('password')) {
			$credentials = array('username' => Input::get('email'), 'password' => Input::get('password'));

			if (Auth::attempt($credentials))
			{
				$user = Auth::user();
				if (Input::get('remember_me'))
				{
					$token = $user->token;
					Cookie::forever('user_token', $token);
				}

				return $this->redirect($user->role);
			}
			else
			{
				$error = 'Incorrect login details.';
			}
		}
		else
		{
			$error = false;
		}

		return View::make('auth.login')->with('error', $error);
	}

	public function action_logout( $everywhere = false )
	{
		if ($everywhere && Auth::check())
		{
			$user = User::find(Auth::user()->id);
			$user->generate_token();
		}

		Auth::logout();
		Cookie::forget('user_token');

		return Redirect::to('/');
	}

	/*
	public function action_register()
	{
		$user				= new User;
		$user->email		= Input::get('email');
		$user->password		= Hash::make( Input::get('password') );
		$user->role			= 'admin';
		$user->save();
		
		return $this->redirect();
	}
	*/

	/*
	public function action_create()
	{	
		$admin				= new User();
		$admin->email		= 'Admin';
		$admin->password	= Hash::make('Password');
		$admin->role		= 'admin';
		$admin->save();
		

		return Redirect::to('auth/login');
	}
	*/

	function redirect($role)
	{
		if (Session::get('return_url'))
		{
			return Redirect::to(Session::get('return_url'));
		}
		return Redirect::to('admin');
	}

}
