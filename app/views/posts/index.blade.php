@extends('layouts.master')

	@section('top-script')
	
	<p><h1><strong>My Theatre Recommendations</strong></h1></p>
	
	@stop
	
	@section('content')
	
	@foreach($posts as $post)

	<p>
		<div class="display-screen">
			<h3><a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a></h3>
			
			<p>{{{ Str::words($post->body, 40) }}}</p>

			<p>Posted by: {{{ $post->user->first_name . " " . $post->user->last_name }}}</p>
		</div>
	<br>
	@endforeach

	{{ $posts->links() }}
	
	@stop
	
	@section('bottom-script')
	<h3><a href="{{{ action('PostsController@create') }}}">
		Create new entry</a></h3>

	@stop