<?php


class News extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'news';

	protected $fillable = array('title', 'guj_title', 'image', 'body', 'guj_body');

}
