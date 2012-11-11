<?php

class Initial {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->string('role');
			$table->string('token');
			$table->timestamps();
		});

		Schema::create('apps', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->string('logo');
			$table->text('description');
			$table->string('status');
			$table->string('password');
			$table->timestamps();
		});

		Schema::create('types', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('logo');
			$table->text('description');
			$table->string('status');
			$table->timestamps();
		});

		Schema::create('builds', function($table)
		{
			$table->increments('id');
			$table->integer('app_id');
			$table->string('slug');
			$table->string('title');
			$table->string('version');
			$table->text('changes');
			$table->string('status');
			$table->timestamps();
		});

		Schema::create('files', function($table)
		{
			$table->increments('id');
			$table->integer('app_id');
			$table->integer('type_id');
			$table->integer('build_id');
			$table->string('filename');
			$table->string('status');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('apps');
		Schema::drop('types');
		Schema::drop('builds');
		Schema::drop('files');
	}

}
