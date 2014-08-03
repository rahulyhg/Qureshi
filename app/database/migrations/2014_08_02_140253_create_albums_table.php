<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name');
			$table->string('guj_name');

			$table->date('date')->nullable();

			$table->text('caption')->nullable();
			$table->text('guj_caption')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('albums');
	}

}
