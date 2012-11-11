<?php

class public_Controller extends Controller {

	public function auth( $client_id ) {
		if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->id == $client_id)) {
			return true;
		}
		return false;
	}

	public function login( $client = false ) {
		return Redirect::to('auth/login');
	}

	public function action_clients( $slug )
	{
		$client = User::where_slug($slug)->first();

		if (!$this->auth( $client->id )) return $this->login( $client );

		$apps = $client->apps()->get();

		return View::make('public/apps', array(
			'client' => $client,
			'apps' => $apps
		));
	}

	public function action_apps( $slug )
	{
		$app = App::where_slug($slug)->first();
		if (!$app) return Response::error('404');

		$client = $app->user;
		$builds = $app->builds()->order_by('updated_at', 'desc')->get();

		return View::make('public/builds', array(
			'client' => $client,
			'app' => $app,
			'builds' => $builds
		));
	}

	public function action_builds( $slug )
	{
		$build = Build::where_slug($slug)->first();
		if (!$build) return Response::error('404');

		$app	= $build->app;
		$client = $app->user;
		$files	= Fileupload::with('type')->where('build_id', '=', $build->id)->get();

		return View::make('public/files', array(
			'client' => $client,
			'app' => $app,
			'build' => $build,
			'files' => $files
		));
	}

}
