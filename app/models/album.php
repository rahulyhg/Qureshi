<?php


class Album extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'albums';

	protected $fillable = array('name', 'guj_name', 'date', 'caption', 'guj_caption');

	public function albumsPhotos()
  	{
    	return $this->hasMany('AlbumPhotos', 'album_id');
  	}

}
