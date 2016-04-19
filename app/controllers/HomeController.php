<?php

class HomeController extends BaseController 
{

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function randomNumber($guess)
	{
		$rand = mt_rand(1,6);
		$data = ['rand' => $rand,'guess' => $guess];
		return View::make('rolldice');
	}

// class exercise april 12th
	public function showForecast()
	{
		return View::make('weather_map');
	}

// class exercise april 15th
	public function login()
	{
		$username = Input::get('user_name');
		$password = Input::get('password');

		if (Auth::attempt(array('user_name' => $username, 'password' => $password))) {
		    $user = Auth::user();
		    return Redirect::action('PostsController@index');
		} else {
			Session::flash('errorMessage', 'Info is incorrect.');
			return Redirect::back()->withInput(); 
		}
	}

// I DON'T UNDERSTAND THIS:
 
// Checking Auth Status
		
	// public function 
	// 	if (Auth::check()) {
	    	
	// 	} else {
		    	
	// 	}

	// // Retrieving the Logged in User
	// 	$loggedInUser = Auth::user();

	// // Logging a User Out
	// 	Auth::logout();
}

	