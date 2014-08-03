<?php

class AlbumPhotosController extends \BaseController {

  private $photo;

  public function __construct() {
    $this->beforeFilter('auth', array(
      'only' => array('destroy')
    ));
  }

  public function show($albumId)
  {
    $paginator = $this->photo->getPictureWithPagination($albumId);
    return View::make('albums.photo', compact('paginator', 'albumId'));
  }

  public function destroy($id)
  {
    $this->photo->removePhoto($id);
    return Redirect::back()->withSuccess('Photo removed successfully');
  }
}