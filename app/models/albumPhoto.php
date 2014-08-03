<?php


class AlbumPhoto extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'albums_photos';

	protected $fillable = array('filename', 'album_id');

}
