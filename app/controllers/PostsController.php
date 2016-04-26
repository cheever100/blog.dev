<?php

class PostsController extends BaseController
{	
	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('auth', array('except'=> ['index', 'show']));
	}

	public function index()
	{
		$posts = Post::paginate(4);
		return View::make('posts.index')->with('posts', $posts); 
	}

	public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		if ($validator->fails())
		{
			Session::flash('errorMessage', "The post was not created.");
			Log::error('Something is really going wrong.');
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$post = new Post();
		$post->title = Input::get('title');
		$post->body = Input::get('body');
		// $post-user
		$post->user_id = User::first()->id;
		$post->save();
		
		Session::flash('successMessage', "The post was completed.");
		Log::info('This is some useful information.');
		return Redirect::action('PostsController@show', $post->id);
	}

	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);		
		if ($validator->fails())
		{
			Session::flash('errorMessage', "The post was not updated.");
			return Redirect::back()->withInput()->withErrors($validator);
		}	
		$post = Post::find($id);
		$post->title = Input::get('title');
		$post->body = Input::get('body');
		$post->save();		
		
			Session::flash('successMessage', "The post was updated.");
			return Redirect::action('PostsController@show', $post->id);
	}

	public function show($id)
	{
		$post = Post::find($id);
		return View::make('posts.show')->with('post',$post);
	}

	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.edit')->with('post', $post);
	}

	public function destroy($id)
	{
		$post = Post::find($id);
		if(!$post) {
			Session::flash('errorMessage', "The post was not found.");	
			return Redirect::action('PostsController@index');
		}	
			$post->delete();	
			Session::flash('successMessage', "The post was successfully deleted.");		
			return Redirect::action('PostsController@index');
	}

}
