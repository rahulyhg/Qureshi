<?php

class AlbumController extends \BaseController {

  public function __construct() {
    $this->beforeFilter('auth', array(
      'only' => array('create', 'store', 'edit', 'update', 'destroy')
    ));
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $albums = Album::paginate(20);
    return View::make('albums.index', compact('albums'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('albums.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $input = Input::all();
    $rules = array(
      'name' => 'required',
      'guj_name' => 'required',
      'date' => 'date'
    );


    // Validate input
    $v = Validator::make($input, $rules);
    if($v->fails()){
      return Redirect::route('gallery.create')->withInput()->withErrors( $v->messages() );
    }

    if(! is_null( $input['date'] ) )
    {
      $input['date'] = date('Y-m-d', strtotime($input['date']));
    }

    $album = new Album();

    $album->fill($input);
    $album->save();


    if( count($input['files']) == 1 && is_null($input['files'][0]) ){
      return;
    }

    // if(! $this->albumPhotosValidator->isValidForCreate($data) )
    // {
    //   throw new ValidationFailedException('Couldnt generate Album. All uploaded files should be images');
    // }

    $files = array();

    foreach ($input['files'] as $index => $file) {
      $fileName = sha1(time() . rand()) .".". $file->getClientOriginalExtension();
      $file->move(public_path().'/image/gallery/', $fileName);

      array_push($files, $fileName);
    }

    $albumPhotos = array();

    foreach ($files as $index => $file) {
      array_push($albumPhotos, array(
        'album_id' => $album->id,
        'filename' => $file,
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now()
      ));
    }

    $albumPhoto = new AlbumPhoto();

    if(! $albumPhoto->insert($albumPhotos) ){
      return Redirect::route('gallery.create')->withError('There was error creating Album');
    }

    return Redirect::route('gallery.index')->withSuccess('Album created successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $album = Album::with('albumsPhotos')->find($id);
    $title = App::getLocale() == "en" ? $album->name : $album->guj_name;
    return View::make('albums.show', compact('album','title'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $album = Album::find($id);
    return View::make('albums.edit', compact('album'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $input = Input::all();
    $rules = array(
      'name' => 'required',
      'guj_name' => 'required',
      'date' => 'date'
    );


    // Validate input
    $v = Validator::make($input, $rules);
    if($v->fails()){
      return Redirect::route('gallery.edit',array($id))->withInput()->withErrors( $v->messages() );
    }

    if(! is_null( $input['date'] ) )
    {
      $input['date'] = date('Y-m-d', strtotime($input['date']));
    }

    $album = Album::find($id);
    $album->fill($input);
    $album->save();

    if( count($input['files']) == 1 && is_null($input['files'][0]) ){
      return;
    }

    $files = array();

    foreach ($input['files'] as $index => $file) {
      $fileName = sha1(time() . rand()) .".". $file->getClientOriginalExtension();
      $file->move(public_path().'/image/gallery/', $fileName);

      array_push($files, $fileName);
    }

    $albumPhotos = array();

    foreach ($files as $index => $file) {
      array_push($albumPhotos, array(
        'album_id' => $album->id,
        'filename' => $file,
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now()
      ));
    }

    $albumPhoto = new AlbumPhoto();

    if(! $albumPhoto->insert($albumPhotos) ){
      return Redirect::route('gallery.edit', array($id))->withError('There was error creating Album');
    }

    return Redirect::route('gallery.index')->withSuccess('Album updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $album = Album::find($id);
    $album->delete();

    return Redirect::route('gallery.index')->withSuccess('News removed successfully');
  }

}