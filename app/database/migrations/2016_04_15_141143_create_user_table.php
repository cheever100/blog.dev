<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration 
{
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('email', 255);
			$table->string('password', 255);
			$table->timestamps();
			$table->rememberToken();	
		});
	}
	
	public function down()
	{
		Schema::drop('users');
	}

}