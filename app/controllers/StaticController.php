<?php

class StaticController extends \BaseController {

	/**
	 * home page
	 */
	public function index()
	{
		$news = array();
		$nextEvent = array();
		$otherDocsLink = array();
		return View::make('static.home', compact('news', 'nextEvent', 'otherDocsLink'));
	}


	/**
	 * about page
	 */
	public function about()
	{
		return View::make('static.about');
	}

	/**
	 * contact page
	 */
	public function contact()
	{
		return View::make('static.contact');
	}


	/**
	 * committee page
	 */
	public function committee()
	{
		return View::make('static.committee');
	}

}
