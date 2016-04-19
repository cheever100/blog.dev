@extends('layouts.master')
@section('content')
	
	<h1>My Blog</h1>
	

	@foreach($posts as $post)

	<p>
		<h3><a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a></h3>
				
	<p>{{{ $post->body }}}</p>

	<p>Written by: {{{ $post->user->first_name . " " . $post->user->last_name }}}</p>
	<br>
	@endforeach

	{{ $posts->links() }}

	<h3><a href="{{{ action('PostsController@create') }}}">
		Create new entry</a></h3>
				
	

@stop