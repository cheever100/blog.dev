<?php
use Carbon\Carbon;


class Post extends BaseModel
{
	public static $rules = [
    'title'      => 'required|max:100',
    'body'       => 'required|max:10000'
	];

	protected $table = 'posts';

	public function user()
	{
		return $this->belongsTo('User');
	}
}
// public function store()
// {
//     // create the validator
//     $validator = Validator::make(Input::all(), Post::$rules);

//     // attempt validation
//     if ($validator->fails()) {
//     	return Redirect::back()->withInput()->withErrors($validator);
//         // validation failed, redirect to the post create page with validation errors and old inputs
//     } else {   
//     	$post = new Post();
// 		$post->title = Input::get('title');
// 		$post->body = Input::get('body');
// 		$post->save();

// 		return Redirect::action('PostsController@index');
// 	}
// }