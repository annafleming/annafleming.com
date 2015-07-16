<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticalSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('practical_skills', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 255);
            $table->tinyInteger('rank');
            $table->tinyInteger('order');
			$table->timestamps();
            $table->tinyInteger('hidden')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('practical_skills');
	}

}
