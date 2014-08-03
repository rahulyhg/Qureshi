<?php

class UsersController extends \BaseController {

	/**
	 * home page
	 */
	public function getLogin()
	{
		return View::make('users.login');
	}


	public function postLogin()
	{
		if(! Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
		{
			return Redirect::back()->withInput()->withError('Wrong username or password!');
		}

		return Redirect::intended('/');

	}





}
