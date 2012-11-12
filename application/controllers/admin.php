<?php

class Admin_Controller extends Controller {

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct()
	{
		if (!Request::cli()) $this->filter('before', 'auth');
	}
	
	public function action_index() {
		$apps = App::all();

		return View::make('admin.home')->with('apps', $apps);
	}

	public function action_upload( $id = false ) {

		if ($id) {
			$build = Build::find($id);
			$app = $build->app;
			$types = Type::all();

			return View::make('admin.upload')->with(array(
				'app' => $app,
				'types' => $types,
				'build' => $build
			));
		} else {
			$apps = App::all();

			return View::make('admin.upload_apps')->with('apps', $apps);
		}
	}

	public function action_do_upload( $build_id, $type_id ) {
		$build = Build::find($build_id);
		$type = Type::find($type_id);
		$app = $build->app;

		$file = FileUpload::where('build_id', '=', $build_id)->where('type_id', '=', $type_id)->first();
		if (!$file) {
			$file = new FileUpload();
			$file->app_id = $app->id;
			$file->build_id = $build_id;
			$file->type_id = $type_id;
		}

		if (!is_dir(path('public').'uploads/'.$app->id.'/'.$build->id.'/'.$type->id)) {
			mkdir(path('public').'uploads/'.$app->id.'/'.$build->id.'/'.$type->id);
		}

		Input::upload('upload', path('public').'uploads/'.$app->id.'/'.$build->id.'/'.$type->id, Input::file('upload.name'));

		$file->filename = Input::file('upload.name');
		$file->save();

		return Response::json( array('success' => 'success') );
	}

	public function action_apps( $id = false )
	{
		if ($id == 'new') {
			$app = new App();
			$app->title = 'New app';
			$app->id = 'new';
		} else if ($id) {
			$app = App::find($id);
			$app->exists = true; // Hack, needed or for some reason it saves as new :S
		} else {
			$app = false;
			$apps = App::all();
		}

		if ($app) {
			if (Request::method() == 'POST') {
				$app->user_id		= Input::get('user_id');
				$app->title			= Input::get('title');
				$app->slug			= Input::get('slug');
				$app->description	= Input::get('description');
				$app->save();

				if (!is_dir(path('public').'uploads/'.$app->id)) {
					mkdir(path('public').'uploads/'.$app->id);
				}

				return Redirect::to('/admin/apps');
			}

			return View::make('admin.app')->with(array(
				'app' => $app,
				'clients' => User::where('role', '=', 'client')->get()
			));
		} else {
			return View::make('admin.apps')->with(array(
				'apps' => $apps
			));
		}
	}

	public function action_types( $id = false )
	{
		if ($id == 'new') {
			$type = new Type();
			$type->title = 'New type';
			$type->id = 'new';
		} else if ($id) {
			$type = Type::find($id);
		} else {
			$type = false;
			$types = Type::all();
		}

		if ($type) {
			if (Request::method() == 'POST') {
				$type->title		= Input::get('title');
				$type->description	= Input::get('description');
				$type->save();

				return Redirect::to('/admin/types');
			}

			return View::make('admin.type')->with(array('type' => $type));
		} else {
			return View::make('admin.list')->with(array(
				'type' => 'types',
				'title' => 'Types',
				'list' => $types
			));
		}
	}

	public function action_clients( $id = false )
	{
		if ($id == 'new') {
			$client = new User();
			$client->email = 'New client';
			$client->id = 'new';
		} else if ($id) {
			$client = User::find($id);
		} else {
			$client = false;
			$clients = User::all();
		}

		if ($client) {
			if (Request::method() == 'POST') {
				$client->role		= Input::get('role');
				$client->email		= Input::get('email');
				$client->slug		= Input::get('slug');
				if (Input::get('password')) $client->password = Hash::make(Input::get('password'));
				$client->save();

				return Redirect::to('/admin/clients');
			}

			return View::make('admin.client')->with(array('client' => $client));
		} else {
			return View::make('admin.clients')->with(array(
				'clients' => $clients
			));
		}
	}

	public function action_builds( $id = false, $app_id = false )
	{
		if ($id == 'new') {
			$build = new Build();
			$build->title = 'New build';
			$build->id = 'new';
			$build->slug = Str::random(6);
		} else if ($id) {
			$build = Build::find($id);
		} else {
			$build = false;
		}

		if ($build) {
			$app = App::find($app_id);
			$types = Type::all();

			if (Request::method() == 'POST') {
				$build->title	= Input::get('title');
				$build->slug	= Input::get('slug');
				$build->version	= Input::get('version');
				$build->changes	= Input::get('changes');
				$build->app_id = $app->id;
				$build->save();

				if (!is_dir(path('public').'uploads/'.$app->id.'/'.$build->id)) {
					mkdir(path('public').'uploads/'.$app->id.'/'.$build->id);
				}

				return Redirect::to("/admin/builds");
			}

			return View::make('admin.build')->with(array(
				'app' => $app,
				'types' => $types,
				'build' => $build
			));
		} else {
			$builds = Build::with ('app')->order_by('updated_at', 'desc')->get();
			
			return View::make('admin.builds')->with(array(
				'type' => 'builds',
				'title' => 'Builds',
				'builds' => $builds
			));
		}
	}

}
