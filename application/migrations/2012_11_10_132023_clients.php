<?php

class Clients {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apps', function($table)
		{
		    $table->integer('user_id');
		});

		Schema::table('users', function($table)
		{
		    $table->string('slug');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apps', function($table)
		{
		    $table->drop_column('user_id');
		});

		Schema::table('users', function($table)
		{
		    $table->drop_column('slug');
		});
	}

}
