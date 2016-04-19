@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
	<h1>Edit Post</h1>
		
  	{{ Form::model($post, ['action' =>['PostsController@update', $post->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => '_post-form']) }}

  
	
	</div>
</div>

	<label>Title</label><br>
		{{ Form::text('title', null, ['placeholder' => 'Title']) }}

		
	<label>Content</label>
	{{ Form::textarea('body', null, ['placeholder' => 'Body', 'cols' => '10', 'rows' => '10']) }}

	
	<input type="submit" value="Save">
	
	</form>
@stop