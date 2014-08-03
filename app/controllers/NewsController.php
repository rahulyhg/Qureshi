<?php

class NewsController extends \BaseController {


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
		$news = News::paginate(20);
		return View::make('news.index', compact('news'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('news.create');
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
		    'title' => 'required',
		    'guj_title' => 'required',
		    'image' => 'image',
		    'body' => 'required',
		    'guj_body' => 'required'
		);


		// Validate input
		$v = Validator::make($input, $rules);
		if($v->fails()){
			return Redirect::route('news.create')->withInput()->withErrors( $v->messages() );
		}

		// Move News image to news folder
	    if( array_key_exists('image', $input) && !is_null($input['image']) ){
	      $fileName = sha1(time() . rand()) .".". $input['image']->getClientOriginalExtension();
	      $input['image']->move(public_path(). '/image/news/', $fileName);
	      $input['image'] = $fileName;
	    }

		$news = new News();

		$news->fill($input);
		$news->save();

		return Redirect::route('news.index')->withSuccess('News created successfully');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$news = News::find($id);
		return View::make('news.show', compact('news'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news = News::find($id);
		return View::make('news.edit', compact('news'));
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
		    'title' => 'required',
		    'guj_title' => 'required',
		    'body' => 'required',
		    'guj_body' => 'required'
		);
		
		if(Input::hasFile('image')){
			$rules['image'] = 'image';
		}

		// Validate input
		$v = Validator::make($input, $rules);
		if($v->fails()){
			return Redirect::route('news.edit', $id)->withInput()->withErrors( $v->messages() );
		}
		// Move News image to news folder
	    if( Input::hasFile('image')){
	      $fileName = sha1(time() . rand()) .".". $input['image']->getClientOriginalExtension();
	      $input['image']->move(public_path(). '/image/news/', $fileName);
	      $input['image'] = $fileName;
	    }

		$news = News::find($id);

		$news->fill($input);
		$news->save();

		return Redirect::route('news.index')->withSuccess('News updated successfully');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$news = News::find($id);
		$news->delete();
		
		return Redirect::route('news.index')->withSuccess('News removed successfully');
	}


}
