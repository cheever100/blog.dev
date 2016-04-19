<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// 10.2.1. basic routing - your first route:
Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/sayhello', function()
{
		return "Hello, Codeup!";
});

// 10.2.1. basic routing - route parameters:
// Route::get('/sayhello/{name}', function($name)
// {
// 	return "Hello, $name!";
// });

// 10.2.1. basic routing - redirecting to another route
// Route::get('/sayhello/{name}', function($name)
// {
// 	if($name == "Chris") {
// 		return Redirect::to('/');
// 	} else {
// 		return "Hello, $name!";
// 	}
// });

// 10.2.2. views - your first view
// Route::get('/sayhello/{name}', function($name)
// {
// 	return View::make('my-first-view');
// });

// 10.2.2. views - passing data to views
Route::get('/sayhello/{name}', function($name)
{
	if ($name == "Chris") {
		return Redirect::to('/');
	} else {
		$data = ['name' => $name];
		return View::make ('my-first-view')->with($data);
	}
});

// Routing Resource Controllers
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');
// or the following:
Route::resource('posts', 'PostsController');

// Eloquent ORM
Route::get('orm-test', function ()
{
 	// $post1 = new Post();
	// $post1->title = 'Eloquent is awesome!';
	// $post1->body  = 'It is super easy to create a new post.';
	// $post1->save();

	// $post2 = new Post();
	// $post2->title = 'Post number two';
	// $post2->body  = 'The body for post number two.';
	// $post2->save();

//showing all posts: 
	// $posts = Post::all();
	// return $posts;

//showing a single post: 
	// $post = Post::find(1);
	// return $post;

	// $post = Post::find(4);
	// $post->title = "Post number 4";
	// $post->body ="The body for post number 4."
	// $post->save();
	// return $post;

	// $post = Post::find(1);
	// $post->delete();
});



Route::get('/', 'HomeController@showWelcome');

Route::get('/portfolio', 'HomeController@showPortfolio');


Route::get('/login', 'UserController@showLogin');
Route::post('/login', 'UserController@doLogin');
Route::get('/logout', 'UserController@logout');




Route::get('/resume', 'HomeController@showResume');

Route::get('/rolldice/{guess}', 'HomeController@rolldice');


// class exercise tuesday april 12:
Route::get('/weather_map', 'HomeController@showForecast');




Route::get('/resume', function()
{
	return "This is my resume";
});

Route::get('/portfolio', function()
{
	return "This is my portfolio";
});

Route::get('/rolldice', function()
{
	$num = rand(1,6);
	$data = ['num' => $num];
    return View::make('roll-dice')->with($data);
});

Route::get('/rolldice{guess}', function($guess)
{
	$random = rand(1,6);
	$data = ['guess' => $guess,'random' => $random];
    return View::make('roll-dice')->with($data);
});

Route::get('my-posts', function() {
	$user = User::first();
	foreach($user->posts as $post) {
		echo "Title is: $post->title" . "<br>";
		echo "Body is: $post->body" . "<br>";
	}
});