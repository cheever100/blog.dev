<?php

class UserController extends BaseController 
{

	public function showLogin()
	{
		return View::make('authentication.login');
	}

	public function doLogin()
	{
		// dd(Input::all());
		if(Auth::attempt([
			'email' => Input::get('email'),
			'password' => Input::get('password')])) {

			return Redirect::intended('/');
		
		} else {
			Session::flash('errorMessage', 'Username or password info is incorrect');
			return Redirect::back()->withInput();
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::action('PostsController@index');
	}


}