<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums_photos', function(Blueprint $table) {
			$table->increments('id');
			$table->text('filename');
			$table->integer('album_id')->unsigned();
			$table->timestamps();

			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('albums_photos');
	}

}
