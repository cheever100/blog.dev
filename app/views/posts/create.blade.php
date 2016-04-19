@extends('layouts.master')
{{-- Add a form to the post create view that will allow creation of a post.  --}}

@section('content')
<div class="container">
	<div class="row">
	<h1>Create New Post</h1>
		
  	{{ Form::open(['action' =>'PostsController@store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => '_post-form']) }}

	</div>
</div>

	<label>Title</label>
	{{ Form::text('title', null, ['placeholder' => 'Title']) }}<br>
		
	<label>Content</label>
	{{ Form::textarea('body', null, ['placeholder' => 'Body', 'cols' => '50', 'rows' => '10']) }}<br>
	
	<input type="submit" value="Save">

	</form>
@stop